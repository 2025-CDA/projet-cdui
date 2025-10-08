<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251008113457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gender CHANGE gender_label label VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trainer CHANGE trainer_full_name full_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE training_course CHANGE formation_name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE work_location CHANGE work_location_label label VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE work_location CHANGE label work_location_label VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE training_course CHANGE name formation_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE trainer CHANGE full_name trainer_full_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE gender CHANGE label gender_label VARCHAR(255) DEFAULT NULL');
    }
}
