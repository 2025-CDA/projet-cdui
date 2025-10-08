<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251008135146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar_form_detail ADD info_form_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE calendar_form_detail ADD CONSTRAINT FK_5C1415767470E03B FOREIGN KEY (info_form_company_id) REFERENCES info_form_company (id)');
        $this->addSql('CREATE INDEX IDX_5C1415767470E03B ON calendar_form_detail (info_form_company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE calendar_form_detail DROP FOREIGN KEY FK_5C1415767470E03B');
        $this->addSql('DROP INDEX IDX_5C1415767470E03B ON calendar_form_detail');
        $this->addSql('ALTER TABLE calendar_form_detail DROP info_form_company_id');
    }
}
