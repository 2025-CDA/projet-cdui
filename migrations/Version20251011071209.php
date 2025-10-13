<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251011071209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_form_company DROP FOREIGN KEY FK_530EBED38F0DCFE2');
        $this->addSql('DROP INDEX UNIQ_530EBED38F0DCFE2 ON info_form_company');
        $this->addSql('ALTER TABLE info_form_company DROP info_form_intern_company_id');
        $this->addSql('ALTER TABLE info_form_intern ADD info_form_intern_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern ADD CONSTRAINT FK_78AFA1678F0DCFE2 FOREIGN KEY (info_form_intern_company_id) REFERENCES info_form_intern_company (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_78AFA1678F0DCFE2 ON info_form_intern (info_form_intern_company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_form_company ADD info_form_intern_company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_company ADD CONSTRAINT FK_530EBED38F0DCFE2 FOREIGN KEY (info_form_intern_company_id) REFERENCES info_form_intern_company (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_530EBED38F0DCFE2 ON info_form_company (info_form_intern_company_id)');
        $this->addSql('ALTER TABLE info_form_intern DROP FOREIGN KEY FK_78AFA1678F0DCFE2');
        $this->addSql('DROP INDEX UNIQ_78AFA1678F0DCFE2 ON info_form_intern');
        $this->addSql('ALTER TABLE info_form_intern DROP info_form_intern_company_id');
    }
}
