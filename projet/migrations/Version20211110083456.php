<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211110083456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE evenement_membre (evenement_id INT NOT NULL, membre_id INT NOT NULL, INDEX IDX_45412BABFD02F13 (evenement_id), INDEX IDX_45412BAB6A99F74A (membre_id), PRIMARY KEY(evenement_id, membre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(80) NOT NULL, prenom VARCHAR(80) NOT NULL, tel VARCHAR(10) NOT NULL, adressemail VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evenement_membre ADD CONSTRAINT FK_45412BABFD02F13 FOREIGN KEY (evenement_id) REFERENCES evenement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE evenement_membre ADD CONSTRAINT FK_45412BAB6A99F74A FOREIGN KEY (membre_id) REFERENCES membre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE evenement_membre DROP FOREIGN KEY FK_45412BAB6A99F74A');
        $this->addSql('DROP TABLE evenement_membre');
        $this->addSql('DROP TABLE membre');
    }
}
