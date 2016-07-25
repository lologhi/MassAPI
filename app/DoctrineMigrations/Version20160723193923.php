<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160723193923 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE PostalCode (id INT AUTO_INCREMENT NOT NULL, geo_id INT DEFAULT NULL, postalCode VARCHAR(255) NOT NULL, inseeCode VARCHAR(255) NOT NULL, cityName VARCHAR(255) NOT NULL, departementName VARCHAR(255) NOT NULL, regionName VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8AB5C409FA49D0B (geo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE PostalCode ADD CONSTRAINT FK_8AB5C409FA49D0B FOREIGN KEY (geo_id) REFERENCES GeoCoordinates (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE PostalCode');
    }
}
