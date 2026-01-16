<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260116133508 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audit (id INT AUTO_INCREMENT NOT NULL, date_intervention DATE NOT NULL, statut VARCHAR(50) NOT NULL, reference_mission VARCHAR(50) NOT NULL, perimétre_declaré VARCHAR(50) NOT NULL, rapport VARCHAR(255) NOT NULL, durée VARCHAR(50) NOT NULL, client_id INT DEFAULT NULL, facture_id INT DEFAULT NULL, INDEX IDX_9218FF7919EB6921 (client_id), UNIQUE INDEX UNIQ_9218FF797F2DEE08 (facture_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, numéro_facture VARCHAR(50) NOT NULL, date DATE NOT NULL, montant NUMERIC(10, 0) NOT NULL, statut VARCHAR(50) NOT NULL, mode_paiement VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF7919EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE audit ADD CONSTRAINT FK_9218FF797F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE audit DROP FOREIGN KEY FK_9218FF7919EB6921');
        $this->addSql('ALTER TABLE audit DROP FOREIGN KEY FK_9218FF797F2DEE08');
        $this->addSql('DROP TABLE audit');
        $this->addSql('DROP TABLE facture');
    }
}
