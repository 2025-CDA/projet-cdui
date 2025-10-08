<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251007132440 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company ADD company_name VARCHAR(255) NOT NULL, ADD siret VARCHAR(255) NOT NULL, ADD phone_number VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE info_form_company ADD company_name VARCHAR(255) DEFAULT NULL, ADD activity VARCHAR(255) DEFAULT NULL, ADD adress VARCHAR(255) DEFAULT NULL, ADD phone_number VARCHAR(255) DEFAULT NULL, ADD fax VARCHAR(255) DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, ADD siret VARCHAR(255) DEFAULT NULL, ADD stamp VARCHAR(255) DEFAULT NULL, ADD legal_representative_last_name VARCHAR(255) DEFAULT NULL, ADD legal_representative_first_name VARCHAR(255) DEFAULT NULL, ADD interview_start_date_time DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD interview_end_date_time DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD agree_terms TINYINT(1) DEFAULT NULL, ADD legal_representative_signature VARCHAR(255) DEFAULT NULL, ADD tutor_last_name VARCHAR(255) DEFAULT NULL, ADD tutor_first_name VARCHAR(255) DEFAULT NULL, ADD tutor_email VARCHAR(255) DEFAULT NULL, ADD tutor_phone_number VARCHAR(255) DEFAULT NULL, ADD activities_caption LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE info_form_intern ADD last_name VARCHAR(255) DEFAULT NULL, ADD first_name VARCHAR(255) DEFAULT NULL, ADD offer_number VARCHAR(255) DEFAULT NULL, ADD id_connexion VARCHAR(255) DEFAULT NULL, ADD start_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\', ADD end_date DATE DEFAULT NULL COMMENT \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE info_form_organization ADD validation_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', ADD signature VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE organization ADD siret VARCHAR(255) NOT NULL, ADD organization_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD id_login VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD first_name VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company DROP company_name, DROP siret, DROP phone_number');
        $this->addSql('ALTER TABLE info_form_company DROP company_name, DROP activity, DROP adress, DROP phone_number, DROP fax, DROP email, DROP siret, DROP stamp, DROP legal_representative_last_name, DROP legal_representative_first_name, DROP interview_start_date_time, DROP interview_end_date_time, DROP agree_terms, DROP legal_representative_signature, DROP tutor_last_name, DROP tutor_first_name, DROP tutor_email, DROP tutor_phone_number, DROP activities_caption');
        $this->addSql('ALTER TABLE info_form_intern DROP last_name, DROP first_name, DROP offer_number, DROP id_connexion, DROP start_date, DROP end_date');
        $this->addSql('ALTER TABLE info_form_organization DROP validation_date, DROP signature');
        $this->addSql('ALTER TABLE organization DROP siret, DROP organization_name');
        $this->addSql('ALTER TABLE user DROP id_login, DROP last_name, DROP first_name');
    }
}
