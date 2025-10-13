<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251011103443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_form DROP FOREIGN KEY FK_BE32FC1B801D77C');
        $this->addSql('DROP INDEX UNIQ_BE32FC1B801D77C ON info_form');
        $this->addSql('ALTER TABLE info_form CHANGE infor_form_organization_id info_form_organization_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form ADD CONSTRAINT FK_BE32FC1DBB3C91D FOREIGN KEY (info_form_organization_id) REFERENCES info_form_organization (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE32FC1DBB3C91D ON info_form (info_form_organization_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE info_form DROP FOREIGN KEY FK_BE32FC1DBB3C91D');
        $this->addSql('DROP INDEX UNIQ_BE32FC1DBB3C91D ON info_form');
        $this->addSql('ALTER TABLE info_form CHANGE info_form_organization_id infor_form_organization_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form ADD CONSTRAINT FK_BE32FC1B801D77C FOREIGN KEY (infor_form_organization_id) REFERENCES info_form_organization (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BE32FC1B801D77C ON info_form (infor_form_organization_id)');
    }
}
