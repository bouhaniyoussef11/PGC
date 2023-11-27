<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125092836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE387253C59D72');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387253C59D72 FOREIGN KEY (responsable_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE etudiant CHANGE cart_etud image VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE etudiant CHANGE image cart_etud VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE club DROP FOREIGN KEY FK_B8EE387253C59D72');
        $this->addSql('ALTER TABLE club ADD CONSTRAINT FK_B8EE387253C59D72 FOREIGN KEY (responsable_id) REFERENCES etudiant (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
