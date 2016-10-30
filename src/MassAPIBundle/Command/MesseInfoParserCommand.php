<?php

namespace MassAPIBundle\Command;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class MesseInfoParserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('massapi:parse')
            ->setDescription('Parse MesseInfo website')
            ->addArgument(
                'nbResults',
                InputArgument::OPTIONAL,
                'How many results to bring ?'
            )
            ->addArgument(
                'zipCode',
                InputArgument::OPTIONAL,
                'Quel département'
            )
            ->addArgument(
                'city',
                InputArgument::OPTIONAL,
                'What city?'
            )
            ->addOption('churchOnly')
            ->addOption('nbPostalCode', null, InputOption::VALUE_REQUIRED, '', 50)
            ->addOption('offsetPostalCode', null, InputOption::VALUE_REQUIRED, '', 0)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $churchOnly         = $input->getOption('churchOnly');
        $nbPostalCode       = $input->getOption('nbPostalCode');
        $offsetPostalCode   = $input->getOption('offsetPostalCode');

        if (true !== $churchOnly) {
            $zipCode    = $input->getArgument('zipCode');
            $city       = $input->getArgument('city');
            $nbResults  = $input->getArgument('nbResults');

            $this->parse($zipCode, $city, $nbResults, $churchOnly);

            return 0;
        }

        /** @var EntityManagerInterface $em */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $postalCodes = $em->getRepository('MassAPIBundle:PostalCode')->findBy(array(), array(), $nbPostalCode, $offsetPostalCode);

        foreach ($postalCodes as $postalCode) {
            $this->parse($postalCode->getPostalCode(), $postalCode->getCityName(), 20, $churchOnly);
        }

        return 0;
    }

    protected function parse($zipCode, $city, $nbResults, $churchOnly)
    {
        $jsonResponse = exec('curl \'http://egliseinfo.catholique.fr/gwtRequest\' -H \'Content-Type: application/json; charset=UTF-8\' --data-binary \'{"F":"cef.kephas.shared.request.AppRequestFactory","I":[{"O":"Bzv0wi60qgwcW5aKiRKrtgNaLKo=","P":[".fr '.$zipCode.' '.$city.'",0,'.$nbResults.',0,null,"",""],"R":["listCelebrationTime.locality"]}]}\'');
        $response = json_decode($jsonResponse, true);

        // Get church
        $placeParser = $this->getContainer()->get('place.parser');
        $placeParser->parse($response);

        if (true !== $churchOnly) {
            // Get mass
            $eventParser = $this->getContainer()->get('event.parser');
            $eventParser->parse($response);
        }
    }
}
