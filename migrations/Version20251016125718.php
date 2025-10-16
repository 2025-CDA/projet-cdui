<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251016125718 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_form_company CHANGE status status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern CHANGE status status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_organization CHANGE status status VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_form_company CHANGE status status VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern CHANGE status status VARCHAR(500) DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_organization CHANGE status status VARCHAR(500) DEFAULT NULL');
    }
}
