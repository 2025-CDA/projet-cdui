<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015085551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_member ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE company_member ADD CONSTRAINT FK_4D7B9E0DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D7B9E0DA76ED395 ON company_member (user_id)');
        $this->addSql('ALTER TABLE organization_member ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE organization_member ADD CONSTRAINT FK_756A2A8DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_756A2A8DA76ED395 ON organization_member (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649468C590E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6494DA009F8');
        $this->addSql('DROP INDEX UNIQ_8D93D649468C590E ON user');
        $this->addSql('DROP INDEX UNIQ_8D93D6494DA009F8 ON user');
        $this->addSql('ALTER TABLE user DROP company_member_id, DROP organization_member_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company_member DROP FOREIGN KEY FK_4D7B9E0DA76ED395');
        $this->addSql('DROP INDEX UNIQ_4D7B9E0DA76ED395 ON company_member');
        $this->addSql('ALTER TABLE company_member DROP user_id');
        $this->addSql('ALTER TABLE organization_member DROP FOREIGN KEY FK_756A2A8DA76ED395');
        $this->addSql('DROP INDEX UNIQ_756A2A8DA76ED395 ON organization_member');
        $this->addSql('ALTER TABLE organization_member DROP user_id');
        $this->addSql('ALTER TABLE user ADD company_member_id INT DEFAULT NULL, ADD organization_member_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649468C590E FOREIGN KEY (company_member_id) REFERENCES company_member (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6494DA009F8 FOREIGN KEY (organization_member_id) REFERENCES organization_member (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649468C590E ON user (company_member_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D6494DA009F8 ON user (organization_member_id)');
    }
}
