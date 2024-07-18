<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240224110748 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE hike (id INT AUTO_INCREMENT NOT NULL, id_hike INT NOT NULL, name_hike VARCHAR(255) NOT NULL, desc_hike VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, hike_id_id INT NOT NULL, id_resa INT NOT NULL, date_hour VARCHAR(255) DEFAULT NULL, is_groupe TINYINT(1) NOT NULL, INDEX IDX_42C84955C1CB17CA (hike_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955C1CB17CA FOREIGN KEY (hike_id_id) REFERENCES hike (id)');
        // $this->addSql('ALTER TABLE users CHANGE birth_user birth_user DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955C1CB17CA');
        $this->addSql('DROP TABLE hike');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('ALTER TABLE users CHANGE birth_user birth_user DATE DEFAULT NULL');
    }
}
