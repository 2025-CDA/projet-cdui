<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251008132108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE company_info_form (company_id INT NOT NULL, info_form_id INT NOT NULL, INDEX IDX_38F8A531979B1AD6 (company_id), INDEX IDX_38F8A531DD33B2E3 (info_form_id), PRIMARY KEY(company_id, info_form_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organization_info_form (organization_id INT NOT NULL, info_form_id INT NOT NULL, INDEX IDX_33D4F5C732C8A3DE (organization_id), INDEX IDX_33D4F5C7DD33B2E3 (info_form_id), PRIMARY KEY(organization_id, info_form_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE training_course_session_trainer (training_course_session_id INT NOT NULL, trainer_id INT NOT NULL, INDEX IDX_C1B8AC4E30D2F31B (training_course_session_id), INDEX IDX_C1B8AC4EFB08EDF6 (trainer_id), PRIMARY KEY(training_course_session_id, trainer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company_info_form ADD CONSTRAINT FK_38F8A531979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE company_info_form ADD CONSTRAINT FK_38F8A531DD33B2E3 FOREIGN KEY (info_form_id) REFERENCES info_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organization_info_form ADD CONSTRAINT FK_33D4F5C732C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organization_info_form ADD CONSTRAINT FK_33D4F5C7DD33B2E3 FOREIGN KEY (info_form_id) REFERENCES info_form (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_course_session_trainer ADD CONSTRAINT FK_C1B8AC4E30D2F31B FOREIGN KEY (training_course_session_id) REFERENCES training_course_session (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE training_course_session_trainer ADD CONSTRAINT FK_C1B8AC4EFB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE work_location');
        $this->addSql('DROP TABLE gender');
        $this->addSql('ALTER TABLE calendar_form_detail ADD work_location VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form ADD intern_id INT DEFAULT NULL, ADD info_form_organization_id INT DEFAULT NULL, ADD info_form_intern_id INT DEFAULT NULL, ADD info_form_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form ADD CONSTRAINT FK_BE32FC1525DD4B4 FOREIGN KEY (intern_id) REFERENCES intern (id)');
        $this->addSql('ALTER TABLE info_form ADD CONSTRAINT FK_BE32FC1DBB3C91D FOREIGN KEY (info_form_organization_id) REFERENCES info_form_organization (id)');
        $this->addSql('ALTER TABLE info_form ADD CONSTRAINT FK_BE32FC1DAAC2B3C FOREIGN KEY (info_form_intern_id) REFERENCES info_form_intern (id)');
        $this->addSql('ALTER TABLE info_form ADD CONSTRAINT FK_BE32FC17470E03B FOREIGN KEY (info_form_company_id) REFERENCES info_form_company (id)');
        $this->addSql('CREATE INDEX IDX_BE32FC1525DD4B4 ON info_form (intern_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE32FC1DBB3C91D ON info_form (info_form_organization_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE32FC1DAAC2B3C ON info_form (info_form_intern_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE32FC17470E03B ON info_form (info_form_company_id)');
        $this->addSql('ALTER TABLE info_form_company ADD gender VARCHAR(255) DEFAULT NULL, ADD work_location VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern ADD info_form_intern_company_id INT DEFAULT NULL, ADD training_course_session_id INT DEFAULT NULL, ADD gender VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern ADD CONSTRAINT FK_78AFA1678F0DCFE2 FOREIGN KEY (info_form_intern_company_id) REFERENCES info_form_intern_company (id)');
        $this->addSql('ALTER TABLE info_form_intern ADD CONSTRAINT FK_78AFA16730D2F31B FOREIGN KEY (training_course_session_id) REFERENCES training_course_session (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_78AFA1678F0DCFE2 ON info_form_intern (info_form_intern_company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_78AFA16730D2F31B ON info_form_intern (training_course_session_id)');
        $this->addSql('ALTER TABLE training_course_session ADD training_course_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE training_course_session ADD CONSTRAINT FK_5FF1DA853790AA66 FOREIGN KEY (training_course_id) REFERENCES training_course (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FF1DA853790AA66 ON training_course_session (training_course_id)');
        $this->addSql('ALTER TABLE user ADD organization_id INT DEFAULT NULL, ADD intern_id INT DEFAULT NULL, ADD company_id INT DEFAULT NULL, ADD trainer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64932C8A3DE FOREIGN KEY (organization_id) REFERENCES organization (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649525DD4B4 FOREIGN KEY (intern_id) REFERENCES intern (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FB08EDF6 FOREIGN KEY (trainer_id) REFERENCES trainer (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64932C8A3DE ON user (organization_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649525DD4B4 ON user (intern_id)');
        $this->addSql('CREATE INDEX IDX_8D93D649979B1AD6 ON user (company_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649FB08EDF6 ON user (trainer_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE work_location (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE gender (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE company_info_form DROP FOREIGN KEY FK_38F8A531979B1AD6');
        $this->addSql('ALTER TABLE company_info_form DROP FOREIGN KEY FK_38F8A531DD33B2E3');
        $this->addSql('ALTER TABLE organization_info_form DROP FOREIGN KEY FK_33D4F5C732C8A3DE');
        $this->addSql('ALTER TABLE organization_info_form DROP FOREIGN KEY FK_33D4F5C7DD33B2E3');
        $this->addSql('ALTER TABLE training_course_session_trainer DROP FOREIGN KEY FK_C1B8AC4E30D2F31B');
        $this->addSql('ALTER TABLE training_course_session_trainer DROP FOREIGN KEY FK_C1B8AC4EFB08EDF6');
        $this->addSql('DROP TABLE company_info_form');
        $this->addSql('DROP TABLE organization_info_form');
        $this->addSql('DROP TABLE training_course_session_trainer');
        $this->addSql('ALTER TABLE info_form_intern DROP FOREIGN KEY FK_78AFA1678F0DCFE2');
        $this->addSql('ALTER TABLE info_form_intern DROP FOREIGN KEY FK_78AFA16730D2F31B');
        $this->addSql('DROP INDEX UNIQ_78AFA1678F0DCFE2 ON info_form_intern');
        $this->addSql('DROP INDEX UNIQ_78AFA16730D2F31B ON info_form_intern');
        $this->addSql('ALTER TABLE info_form_intern DROP info_form_intern_company_id, DROP training_course_session_id, DROP gender');
        $this->addSql('ALTER TABLE calendar_form_detail DROP work_location');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64932C8A3DE');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649525DD4B4');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649979B1AD6');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FB08EDF6');
        $this->addSql('DROP INDEX IDX_8D93D64932C8A3DE ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649525DD4B4 ON user');
        $this->addSql('DROP INDEX IDX_8D93D649979B1AD6 ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D649FB08EDF6 ON user');
        $this->addSql('ALTER TABLE user DROP organization_id, DROP intern_id, DROP company_id, DROP trainer_id');
        $this->addSql('ALTER TABLE training_course_session DROP FOREIGN KEY FK_5FF1DA853790AA66');
        $this->addSql('DROP INDEX UNIQ_5FF1DA853790AA66 ON training_course_session');
        $this->addSql('ALTER TABLE training_course_session DROP training_course_id');
        $this->addSql('ALTER TABLE info_form_company DROP gender, DROP work_location');
        $this->addSql('ALTER TABLE info_form DROP FOREIGN KEY FK_BE32FC1525DD4B4');
        $this->addSql('ALTER TABLE info_form DROP FOREIGN KEY FK_BE32FC1DBB3C91D');
        $this->addSql('ALTER TABLE info_form DROP FOREIGN KEY FK_BE32FC1DAAC2B3C');
        $this->addSql('ALTER TABLE info_form DROP FOREIGN KEY FK_BE32FC17470E03B');
        $this->addSql('DROP INDEX IDX_BE32FC1525DD4B4 ON info_form');
        $this->addSql('DROP INDEX UNIQ_BE32FC1DBB3C91D ON info_form');
        $this->addSql('DROP INDEX UNIQ_BE32FC1DAAC2B3C ON info_form');
        $this->addSql('DROP INDEX UNIQ_BE32FC17470E03B ON info_form');
        $this->addSql('ALTER TABLE info_form DROP intern_id, DROP info_form_organization_id, DROP info_form_intern_id, DROP info_form_company_id');
    }
}
