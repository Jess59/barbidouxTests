<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240423130951 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hike ADD city_hike VARCHAR(30) DEFAULT NULL, ADD time_hike DOUBLE PRECISION DEFAULT NULL, ADD dist_hike VARCHAR(10) DEFAULT NULL, ADD height_hike VARCHAR(30) DEFAULT NULL, ADD down_hike VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE users CHANGE birth_user birth_user DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE hike DROP city_hike, DROP time_hike, DROP dist_hike, DROP height_hike, DROP down_hike');
        $this->addSql('ALTER TABLE users CHANGE birth_user birth_user DATE DEFAULT NULL');
    }
}
