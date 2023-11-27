<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124112151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, contenu VARCHAR(255) NOT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', INDEX IDX_F65593E560BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, responsable_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, datecreation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_B8EE387253C59D72 (responsable_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE demande (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, club_associé VARCHAR(255) NOT NULL, date_demande DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE droit_acces (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', clu_associe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etudiant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, cart_etud VARCHAR(255) NOT NULL, specialite VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, club_associe_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, date_reservation DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_42C849558DDC6F61 (club_associe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, carte_etud DOUBLE PRECISION NOT NULL, specialite VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE annonce ADD CONSTRAINT FK_F65593E560BB6FE6 FOREIGN KEY (auteur_id) REFERENCES club (id)');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387253C59D72 FOREIGN KEY (responsable_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849558DDC6F61 FOREIGN KEY (club_associe_id) REFERENCES club (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE annonce DROP FOREIGN KEY FK_F65593E560BB6FE6');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE387253C59D72');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849558DDC6F61');
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE demande');
        $this->addSql('DROP TABLE droit_acces');
        $this->addSql('DROP TABLE etudiant');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE `user`');
    }
}
