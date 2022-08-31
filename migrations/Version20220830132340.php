<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220830132340 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD auteurs_id INT DEFAULT NULL, ADD price INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD3168AE784107 FOREIGN KEY (auteurs_id) REFERENCES auteurs (id)');
        $this->addSql('CREATE INDEX IDX_BFDD3168AE784107 ON articles (auteurs_id)');
        $this->addSql('ALTER TABLE auteurs ADD relation VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD3168AE784107');
        $this->addSql('DROP INDEX IDX_BFDD3168AE784107 ON articles');
        $this->addSql('ALTER TABLE articles DROP auteurs_id, DROP price');
        $this->addSql('ALTER TABLE auteurs DROP relation');
    }
}
