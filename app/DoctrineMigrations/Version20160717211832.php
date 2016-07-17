<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160717211832 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A337B987D8');
        $this->addSql('DROP INDEX UNIQ_FA6F25A337B987D8 ON Event');
        $this->addSql('ALTER TABLE Event ADD duration VARCHAR(255) DEFAULT NULL, DROP duration_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Event ADD duration_id INT DEFAULT NULL, DROP duration');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A337B987D8 FOREIGN KEY (duration_id) REFERENCES Duration (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FA6F25A337B987D8 ON Event (duration_id)');
    }
}
