<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251008101103 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE calendar_form_detail (id INT AUTO_INCREMENT NOT NULL, day VARCHAR(255) DEFAULT NULL, start_morning TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', end_morning TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', start_afternoon TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', end_afternoon TIME DEFAULT NULL COMMENT \'(DC2Type:time_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, gender_label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE info_form_intern_company (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, contact_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trainer (id INT AUTO_INCREMENT NOT NULL, trainer_full_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_course (id INT AUTO_INCREMENT NOT NULL, formation_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_course_session (id INT AUTO_INCREMENT NOT NULL, offer_number VARCHAR(255) DEFAULT NULL, start_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', end_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE work_location (id INT AUTO_INCREMENT NOT NULL, work_location_label VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE info_form ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_company DROP legal_representative_gender, DROP work_location');
        $this->addSql('ALTER TABLE info_form_intern CHANGE gender email VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE calendar_form_detail');
        $this->addSql('DROP TABLE gender');
        $this->addSql('DROP TABLE info_form_intern_company');
        $this->addSql('DROP TABLE trainer');
        $this->addSql('DROP TABLE training_course');
        $this->addSql('DROP TABLE training_course_session');
        $this->addSql('DROP TABLE work_location');
        $this->addSql('ALTER TABLE info_form DROP status');
        $this->addSql('ALTER TABLE info_form_company ADD legal_representative_gender VARCHAR(255) DEFAULT NULL, ADD work_location VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern CHANGE email gender VARCHAR(255) DEFAULT NULL');
    }
}
