<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240224112110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reservation_users (reservation_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_57FC754EB83297E7 (reservation_id), INDEX IDX_57FC754E67B3B43D (users_id), PRIMARY KEY(reservation_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reservation_users ADD CONSTRAINT FK_57FC754EB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_users ADD CONSTRAINT FK_57FC754E67B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation_users DROP FOREIGN KEY FK_57FC754EB83297E7');
        $this->addSql('ALTER TABLE reservation_users DROP FOREIGN KEY FK_57FC754E67B3B43D');
        $this->addSql('DROP TABLE reservation_users');
    }
}
