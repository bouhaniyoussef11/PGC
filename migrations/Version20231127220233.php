<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231127220233 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE demande_club (demande_id INT NOT NULL, club_id INT NOT NULL, INDEX IDX_DF4B4AA780E95E18 (demande_id), INDEX IDX_DF4B4AA761190A32 (club_id), PRIMARY KEY(demande_id, club_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE demande_club ADD CONSTRAINT FK_DF4B4AA780E95E18 FOREIGN KEY (demande_id) REFERENCES demande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande_club ADD CONSTRAINT FK_DF4B4AA761190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE demande DROP club_associé');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande_club DROP FOREIGN KEY FK_DF4B4AA780E95E18');
        $this->addSql('ALTER TABLE demande_club DROP FOREIGN KEY FK_DF4B4AA761190A32');
        $this->addSql('DROP TABLE demande_club');
        $this->addSql('ALTER TABLE demande ADD club_associé VARCHAR(255) NOT NULL');
    }
}
