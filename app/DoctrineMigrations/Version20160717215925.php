<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160717215925 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Duration');
        $this->addSql('DROP TABLE event_place');
        $this->addSql('DROP TABLE place_event');
        $this->addSql('ALTER TABLE Event ADD location_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A364D218E FOREIGN KEY (location_id) REFERENCES Place (id)');
        $this->addSql('CREATE INDEX IDX_FA6F25A364D218E ON Event (location_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Duration (id INT AUTO_INCREMENT NOT NULL, alternateName VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_place (event_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_3506E2E171F7E88B (event_id), INDEX IDX_3506E2E1DA6A219 (place_id), PRIMARY KEY(event_id, place_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_event (place_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_92D81184DA6A219 (place_id), INDEX IDX_92D8118471F7E88B (event_id), PRIMARY KEY(place_id, event_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_place ADD CONSTRAINT FK_3506E2E171F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_place ADD CONSTRAINT FK_3506E2E1DA6A219 FOREIGN KEY (place_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_event ADD CONSTRAINT FK_92D8118471F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_event ADD CONSTRAINT FK_92D81184DA6A219 FOREIGN KEY (place_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A364D218E');
        $this->addSql('DROP INDEX IDX_FA6F25A364D218E ON Event');
        $this->addSql('ALTER TABLE Event DROP location_id');
    }
}
