<?php

namespace MassAPIBundle\Command;


use Doctrine\ORM\EntityManagerInterface;
use MassAPIBundle\Entity\GeoCoordinates;
use MassAPIBundle\Entity\PostalCode;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CodePostauxParserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('codepostaux:parse')
            ->setDescription('Parse code postaux')
            ->addArgument(
                'path',
                InputArgument::REQUIRED,
                'Path to CSV file'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('path');
        if (($handle = fopen($path, "r")) === FALSE) {
            return;
        }

        $progress = new ProgressBar($output, intval(exec("wc -l '$path'")));
        $progress->start();

        /** @var EntityManagerInterface $em */
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $i = 0;
        while (($data = fgetcsv($handle, null, ';')) !== FALSE) {
            if (0 === $i) {
                $i++;
                continue;
            }

            if (1 !== count(explode(' ', $data[9]))) {
                // multiple postal code on the same line
                $i++;
                continue;
            }

            if ('' === $data[11] || '' === $data[12] || '-' === $data[11] || '-' === $data[12]) {
                // No geo coordinates
                // or weirder, just '-' as a longitude... Maybe it should be replaced by 0?
                $i++;
                continue;
            }

            $latitude = str_replace(',', '.', $data[11]);
            $longitude = str_replace(',', '.', $data[12]);

            $geo = new GeoCoordinates();
            $geo->setLatitude($latitude);
            $geo->setLongitude($longitude);
            $geo->setGeoPoint('{ "type": "Point", "coordinates": ['.$longitude.', '.$latitude.'] }');

            $postalCode = new PostalCode();
            $postalCode->setGeo($geo);
            $postalCode->setCityName($data[8]);
            $postalCode->setPostalCode($data[9]);
            $postalCode->setInseeCode($data[10]);
            $postalCode->setDepartementName($data[5]);
            $postalCode->setRegionName($data[2]);

            $em->persist($postalCode);

            $i++;
            $progress->advance();
        }

        $em->flush();

        fclose($handle);
        $progress->finish();
    }
}
