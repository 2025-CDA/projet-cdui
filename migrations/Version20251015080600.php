<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251015080600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intern_member ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE intern_member ADD CONSTRAINT FK_31CB5C38A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_31CB5C38A76ED395 ON intern_member (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64956817849');
        $this->addSql('DROP INDEX UNIQ_8D93D64956817849 ON user');
        $this->addSql('ALTER TABLE user DROP intern_member_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE intern_member DROP FOREIGN KEY FK_31CB5C38A76ED395');
        $this->addSql('DROP INDEX UNIQ_31CB5C38A76ED395 ON intern_member');
        $this->addSql('ALTER TABLE intern_member DROP user_id');
        $this->addSql('ALTER TABLE user ADD intern_member_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64956817849 FOREIGN KEY (intern_member_id) REFERENCES intern_member (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D64956817849 ON user (intern_member_id)');
    }
}
