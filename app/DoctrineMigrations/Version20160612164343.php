<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160612164343 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE AggregateRating (id INT AUTO_INCREMENT NOT NULL, ratingCount INT DEFAULT NULL, reviewCount INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE aggregaterating_event (aggregaterating_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_1BFD5092B908C7E (aggregaterating_id), INDEX IDX_1BFD509271F7E88B (event_id), PRIMARY KEY(aggregaterating_id, event_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Country (id INT AUTO_INCREMENT NOT NULL, geo_id INT DEFAULT NULL, globalLocationNumber VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_9CCEF0FAFA49D0B (geo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE CreativeWork (id INT AUTO_INCREMENT NOT NULL, publisher_id INT DEFAULT NULL, datePublished DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, genre VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, recordedAt_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_8E158A9140C86FCE (publisher_id), UNIQUE INDEX UNIQ_8E158A9154260A9D (recordedAt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE creativework_person (creativework_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_3EE55CFA71598451 (creativework_id), INDEX IDX_3EE55CFA217BBB47 (person_id), PRIMARY KEY(creativework_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Duration (id INT AUTO_INCREMENT NOT NULL, alternateName VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Event (id INT AUTO_INCREMENT NOT NULL, duration_id INT DEFAULT NULL, image_id INT DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, doorTime DATETIME DEFAULT NULL, endDate DATE DEFAULT NULL, eventStatus VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, previousStartDate DATE DEFAULT NULL, startDate DATE DEFAULT NULL, typicalAgeRange VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, aggregateRating_id INT DEFAULT NULL, recordedIn_id INT DEFAULT NULL, subEvent_id INT DEFAULT NULL, superEvent_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_FA6F25A389610EDD (aggregateRating_id), UNIQUE INDEX UNIQ_FA6F25A337B987D8 (duration_id), INDEX IDX_FA6F25A33DA5256D (image_id), UNIQUE INDEX UNIQ_FA6F25A35BF2F6A7 (recordedIn_id), INDEX IDX_FA6F25A383113754 (subEvent_id), INDEX IDX_FA6F25A34EB9830C (superEvent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_actor (event_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_56EE7D571F7E88B (event_id), INDEX IDX_56EE7D5217BBB47 (person_id), PRIMARY KEY(event_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_organizer (event_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_1F414F4E71F7E88B (event_id), INDEX IDX_1F414F4E217BBB47 (person_id), PRIMARY KEY(event_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_attendee (event_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_57BC3CB771F7E88B (event_id), INDEX IDX_57BC3CB7217BBB47 (person_id), PRIMARY KEY(event_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_director (event_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_587C3A2071F7E88B (event_id), INDEX IDX_587C3A20217BBB47 (person_id), PRIMARY KEY(event_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_language (event_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_9237986571F7E88B (event_id), INDEX IDX_9237986582F1BAF4 (language_id), PRIMARY KEY(event_id, language_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_place (event_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_3506E2E171F7E88B (event_id), INDEX IDX_3506E2E1DA6A219 (place_id), PRIMARY KEY(event_id, place_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_performer (event_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_91B435D671F7E88B (event_id), INDEX IDX_91B435D6217BBB47 (person_id), PRIMARY KEY(event_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_review (event_id INT NOT NULL, review_id INT NOT NULL, INDEX IDX_4BDAF69471F7E88B (event_id), INDEX IDX_4BDAF6943E2E969B (review_id), PRIMARY KEY(event_id, review_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE GeoCoordinates (id INT AUTO_INCREMENT NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE GeoShape (id INT AUTO_INCREMENT NOT NULL, polygon VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ImageObject (id INT AUTO_INCREMENT NOT NULL, thumbnail_id INT DEFAULT NULL, caption VARCHAR(255) DEFAULT NULL, exifData VARCHAR(255) DEFAULT NULL, INDEX IDX_B4E04938FDFF2E92 (thumbnail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Language (id INT AUTO_INCREMENT NOT NULL, alternateName VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE OpeningHoursSpecification (id INT AUTO_INCREMENT NOT NULL, closes TIME NOT NULL, dayOfWeek LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', opens TIME NOT NULL, validFrom DATETIME DEFAULT NULL, validThrough DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Organization (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Person (id INT AUTO_INCREMENT NOT NULL, birthDate DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, gender VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Place (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, geo_id INT DEFAULT NULL, logo_id INT DEFAULT NULL, photo_id INT DEFAULT NULL, faxNumber VARCHAR(255) DEFAULT NULL, globalLocationNumber VARCHAR(255) DEFAULT NULL, hasMap VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, aggregateRating_id INT DEFAULT NULL, specialOpeningHoursSpecification_id INT DEFAULT NULL, INDEX IDX_B5DC7CC9F5B7AF75 (address_id), UNIQUE INDEX UNIQ_B5DC7CC989610EDD (aggregateRating_id), UNIQUE INDEX UNIQ_B5DC7CC9FA49D0B (geo_id), INDEX IDX_B5DC7CC9F98F144A (logo_id), UNIQUE INDEX UNIQ_B5DC7CC98D208EFB (specialOpeningHoursSpecification_id), INDEX IDX_B5DC7CC97E9E4C8C (photo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_contained_in (place_source INT NOT NULL, place_target INT NOT NULL, INDEX IDX_F83384A6FD44781A (place_source), INDEX IDX_F83384A6E4A12895 (place_target), PRIMARY KEY(place_source, place_target)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_contains (place_source INT NOT NULL, place_target INT NOT NULL, INDEX IDX_A4A18DFDFD44781A (place_source), INDEX IDX_A4A18DFDE4A12895 (place_target), PRIMARY KEY(place_source, place_target)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_event (place_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_92D81184DA6A219 (place_id), INDEX IDX_92D8118471F7E88B (event_id), PRIMARY KEY(place_id, event_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_openinghoursspecification (place_id INT NOT NULL, openinghoursspecification_id INT NOT NULL, INDEX IDX_9BEA3136DA6A219 (place_id), UNIQUE INDEX UNIQ_9BEA3136CAA82629 (openinghoursspecification_id), PRIMARY KEY(place_id, openinghoursspecification_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place_review (place_id INT NOT NULL, review_id INT NOT NULL, INDEX IDX_DB8D86AFDA6A219 (place_id), INDEX IDX_DB8D86AF3E2E969B (review_id), PRIMARY KEY(place_id, review_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE PostalAddress (id INT AUTO_INCREMENT NOT NULL, addressLocality VARCHAR(255) DEFAULT NULL, addressRegion VARCHAR(255) DEFAULT NULL, postalCode VARCHAR(255) DEFAULT NULL, postOfficeBoxNumber VARCHAR(255) DEFAULT NULL, streetAddress VARCHAR(255) DEFAULT NULL, addressCountry_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_57993AEA61AFA0F5 (addressCountry_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Review (id INT AUTO_INCREMENT NOT NULL, datePublished DATE DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, recordedAt_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_7EEF84F054260A9D (recordedAt_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE review_person (review_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_BEAA96B63E2E969B (review_id), INDEX IDX_BEAA96B6217BBB47 (person_id), PRIMARY KEY(review_id, person_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE aggregaterating_event ADD CONSTRAINT FK_1BFD5092B908C7E FOREIGN KEY (aggregaterating_id) REFERENCES AggregateRating (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE aggregaterating_event ADD CONSTRAINT FK_1BFD509271F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Country ADD CONSTRAINT FK_9CCEF0FAFA49D0B FOREIGN KEY (geo_id) REFERENCES GeoShape (id)');
        $this->addSql('ALTER TABLE CreativeWork ADD CONSTRAINT FK_8E158A9140C86FCE FOREIGN KEY (publisher_id) REFERENCES Organization (id)');
        $this->addSql('ALTER TABLE CreativeWork ADD CONSTRAINT FK_8E158A9154260A9D FOREIGN KEY (recordedAt_id) REFERENCES Event (id)');
        $this->addSql('ALTER TABLE creativework_person ADD CONSTRAINT FK_3EE55CFA71598451 FOREIGN KEY (creativework_id) REFERENCES CreativeWork (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE creativework_person ADD CONSTRAINT FK_3EE55CFA217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A389610EDD FOREIGN KEY (aggregateRating_id) REFERENCES AggregateRating (id)');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A337B987D8 FOREIGN KEY (duration_id) REFERENCES Duration (id)');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A33DA5256D FOREIGN KEY (image_id) REFERENCES ImageObject (id)');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A35BF2F6A7 FOREIGN KEY (recordedIn_id) REFERENCES CreativeWork (id)');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A383113754 FOREIGN KEY (subEvent_id) REFERENCES Event (id)');
        $this->addSql('ALTER TABLE Event ADD CONSTRAINT FK_FA6F25A34EB9830C FOREIGN KEY (superEvent_id) REFERENCES Event (id)');
        $this->addSql('ALTER TABLE event_actor ADD CONSTRAINT FK_56EE7D571F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_actor ADD CONSTRAINT FK_56EE7D5217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_organizer ADD CONSTRAINT FK_1F414F4E71F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_organizer ADD CONSTRAINT FK_1F414F4E217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_attendee ADD CONSTRAINT FK_57BC3CB771F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_attendee ADD CONSTRAINT FK_57BC3CB7217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_director ADD CONSTRAINT FK_587C3A2071F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_director ADD CONSTRAINT FK_587C3A20217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_language ADD CONSTRAINT FK_9237986571F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_language ADD CONSTRAINT FK_9237986582F1BAF4 FOREIGN KEY (language_id) REFERENCES Language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_place ADD CONSTRAINT FK_3506E2E171F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_place ADD CONSTRAINT FK_3506E2E1DA6A219 FOREIGN KEY (place_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_performer ADD CONSTRAINT FK_91B435D671F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_performer ADD CONSTRAINT FK_91B435D6217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_review ADD CONSTRAINT FK_4BDAF69471F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_review ADD CONSTRAINT FK_4BDAF6943E2E969B FOREIGN KEY (review_id) REFERENCES Review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ImageObject ADD CONSTRAINT FK_B4E04938FDFF2E92 FOREIGN KEY (thumbnail_id) REFERENCES ImageObject (id)');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC9F5B7AF75 FOREIGN KEY (address_id) REFERENCES PostalAddress (id)');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC989610EDD FOREIGN KEY (aggregateRating_id) REFERENCES AggregateRating (id)');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC9FA49D0B FOREIGN KEY (geo_id) REFERENCES GeoCoordinates (id)');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC9F98F144A FOREIGN KEY (logo_id) REFERENCES ImageObject (id)');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC98D208EFB FOREIGN KEY (specialOpeningHoursSpecification_id) REFERENCES OpeningHoursSpecification (id)');
        $this->addSql('ALTER TABLE Place ADD CONSTRAINT FK_B5DC7CC97E9E4C8C FOREIGN KEY (photo_id) REFERENCES ImageObject (id)');
        $this->addSql('ALTER TABLE place_contained_in ADD CONSTRAINT FK_F83384A6FD44781A FOREIGN KEY (place_source) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_contained_in ADD CONSTRAINT FK_F83384A6E4A12895 FOREIGN KEY (place_target) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_contains ADD CONSTRAINT FK_A4A18DFDFD44781A FOREIGN KEY (place_source) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_contains ADD CONSTRAINT FK_A4A18DFDE4A12895 FOREIGN KEY (place_target) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_event ADD CONSTRAINT FK_92D81184DA6A219 FOREIGN KEY (place_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_event ADD CONSTRAINT FK_92D8118471F7E88B FOREIGN KEY (event_id) REFERENCES Event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_openinghoursspecification ADD CONSTRAINT FK_9BEA3136DA6A219 FOREIGN KEY (place_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_openinghoursspecification ADD CONSTRAINT FK_9BEA3136CAA82629 FOREIGN KEY (openinghoursspecification_id) REFERENCES OpeningHoursSpecification (id)');
        $this->addSql('ALTER TABLE place_review ADD CONSTRAINT FK_DB8D86AFDA6A219 FOREIGN KEY (place_id) REFERENCES Place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE place_review ADD CONSTRAINT FK_DB8D86AF3E2E969B FOREIGN KEY (review_id) REFERENCES Review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE PostalAddress ADD CONSTRAINT FK_57993AEA61AFA0F5 FOREIGN KEY (addressCountry_id) REFERENCES Country (id)');
        $this->addSql('ALTER TABLE Review ADD CONSTRAINT FK_7EEF84F054260A9D FOREIGN KEY (recordedAt_id) REFERENCES Event (id)');
        $this->addSql('ALTER TABLE review_person ADD CONSTRAINT FK_BEAA96B63E2E969B FOREIGN KEY (review_id) REFERENCES Review (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE review_person ADD CONSTRAINT FK_BEAA96B6217BBB47 FOREIGN KEY (person_id) REFERENCES Person (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE aggregaterating_event DROP FOREIGN KEY FK_1BFD5092B908C7E');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A389610EDD');
        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC989610EDD');
        $this->addSql('ALTER TABLE PostalAddress DROP FOREIGN KEY FK_57993AEA61AFA0F5');
        $this->addSql('ALTER TABLE creativework_person DROP FOREIGN KEY FK_3EE55CFA71598451');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A35BF2F6A7');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A337B987D8');
        $this->addSql('ALTER TABLE aggregaterating_event DROP FOREIGN KEY FK_1BFD509271F7E88B');
        $this->addSql('ALTER TABLE CreativeWork DROP FOREIGN KEY FK_8E158A9154260A9D');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A383113754');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A34EB9830C');
        $this->addSql('ALTER TABLE event_actor DROP FOREIGN KEY FK_56EE7D571F7E88B');
        $this->addSql('ALTER TABLE event_organizer DROP FOREIGN KEY FK_1F414F4E71F7E88B');
        $this->addSql('ALTER TABLE event_attendee DROP FOREIGN KEY FK_57BC3CB771F7E88B');
        $this->addSql('ALTER TABLE event_director DROP FOREIGN KEY FK_587C3A2071F7E88B');
        $this->addSql('ALTER TABLE event_language DROP FOREIGN KEY FK_9237986571F7E88B');
        $this->addSql('ALTER TABLE event_place DROP FOREIGN KEY FK_3506E2E171F7E88B');
        $this->addSql('ALTER TABLE event_performer DROP FOREIGN KEY FK_91B435D671F7E88B');
        $this->addSql('ALTER TABLE event_review DROP FOREIGN KEY FK_4BDAF69471F7E88B');
        $this->addSql('ALTER TABLE place_event DROP FOREIGN KEY FK_92D8118471F7E88B');
        $this->addSql('ALTER TABLE Review DROP FOREIGN KEY FK_7EEF84F054260A9D');
        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC9FA49D0B');
        $this->addSql('ALTER TABLE Country DROP FOREIGN KEY FK_9CCEF0FAFA49D0B');
        $this->addSql('ALTER TABLE Event DROP FOREIGN KEY FK_FA6F25A33DA5256D');
        $this->addSql('ALTER TABLE ImageObject DROP FOREIGN KEY FK_B4E04938FDFF2E92');
        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC9F98F144A');
        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC97E9E4C8C');
        $this->addSql('ALTER TABLE event_language DROP FOREIGN KEY FK_9237986582F1BAF4');
        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC98D208EFB');
        $this->addSql('ALTER TABLE place_openinghoursspecification DROP FOREIGN KEY FK_9BEA3136CAA82629');
        $this->addSql('ALTER TABLE CreativeWork DROP FOREIGN KEY FK_8E158A9140C86FCE');
        $this->addSql('ALTER TABLE creativework_person DROP FOREIGN KEY FK_3EE55CFA217BBB47');
        $this->addSql('ALTER TABLE event_actor DROP FOREIGN KEY FK_56EE7D5217BBB47');
        $this->addSql('ALTER TABLE event_organizer DROP FOREIGN KEY FK_1F414F4E217BBB47');
        $this->addSql('ALTER TABLE event_attendee DROP FOREIGN KEY FK_57BC3CB7217BBB47');
        $this->addSql('ALTER TABLE event_director DROP FOREIGN KEY FK_587C3A20217BBB47');
        $this->addSql('ALTER TABLE event_performer DROP FOREIGN KEY FK_91B435D6217BBB47');
        $this->addSql('ALTER TABLE review_person DROP FOREIGN KEY FK_BEAA96B6217BBB47');
        $this->addSql('ALTER TABLE event_place DROP FOREIGN KEY FK_3506E2E1DA6A219');
        $this->addSql('ALTER TABLE place_contained_in DROP FOREIGN KEY FK_F83384A6FD44781A');
        $this->addSql('ALTER TABLE place_contained_in DROP FOREIGN KEY FK_F83384A6E4A12895');
        $this->addSql('ALTER TABLE place_contains DROP FOREIGN KEY FK_A4A18DFDFD44781A');
        $this->addSql('ALTER TABLE place_contains DROP FOREIGN KEY FK_A4A18DFDE4A12895');
        $this->addSql('ALTER TABLE place_event DROP FOREIGN KEY FK_92D81184DA6A219');
        $this->addSql('ALTER TABLE place_openinghoursspecification DROP FOREIGN KEY FK_9BEA3136DA6A219');
        $this->addSql('ALTER TABLE place_review DROP FOREIGN KEY FK_DB8D86AFDA6A219');
        $this->addSql('ALTER TABLE Place DROP FOREIGN KEY FK_B5DC7CC9F5B7AF75');
        $this->addSql('ALTER TABLE event_review DROP FOREIGN KEY FK_4BDAF6943E2E969B');
        $this->addSql('ALTER TABLE place_review DROP FOREIGN KEY FK_DB8D86AF3E2E969B');
        $this->addSql('ALTER TABLE review_person DROP FOREIGN KEY FK_BEAA96B63E2E969B');
        $this->addSql('DROP TABLE AggregateRating');
        $this->addSql('DROP TABLE aggregaterating_event');
        $this->addSql('DROP TABLE Country');
        $this->addSql('DROP TABLE CreativeWork');
        $this->addSql('DROP TABLE creativework_person');
        $this->addSql('DROP TABLE Duration');
        $this->addSql('DROP TABLE Event');
        $this->addSql('DROP TABLE event_actor');
        $this->addSql('DROP TABLE event_organizer');
        $this->addSql('DROP TABLE event_attendee');
        $this->addSql('DROP TABLE event_director');
        $this->addSql('DROP TABLE event_language');
        $this->addSql('DROP TABLE event_place');
        $this->addSql('DROP TABLE event_performer');
        $this->addSql('DROP TABLE event_review');
        $this->addSql('DROP TABLE GeoCoordinates');
        $this->addSql('DROP TABLE GeoShape');
        $this->addSql('DROP TABLE ImageObject');
        $this->addSql('DROP TABLE Language');
        $this->addSql('DROP TABLE OpeningHoursSpecification');
        $this->addSql('DROP TABLE Organization');
        $this->addSql('DROP TABLE Person');
        $this->addSql('DROP TABLE Place');
        $this->addSql('DROP TABLE place_contained_in');
        $this->addSql('DROP TABLE place_contains');
        $this->addSql('DROP TABLE place_event');
        $this->addSql('DROP TABLE place_openinghoursspecification');
        $this->addSql('DROP TABLE place_review');
        $this->addSql('DROP TABLE PostalAddress');
        $this->addSql('DROP TABLE Review');
        $this->addSql('DROP TABLE review_person');
    }
}
