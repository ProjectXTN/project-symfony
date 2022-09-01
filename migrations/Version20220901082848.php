<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220901082848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_articles (category_id INT NOT NULL, articles_id INT NOT NULL, INDEX IDX_8A7B51312469DE2 (category_id), INDEX IDX_8A7B5131EBAF6CC (articles_id), PRIMARY KEY(category_id, articles_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_articles ADD CONSTRAINT FK_8A7B51312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_articles ADD CONSTRAINT FK_8A7B5131EBAF6CC FOREIGN KEY (articles_id) REFERENCES articles (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE articles DROP date_ut');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_articles DROP FOREIGN KEY FK_8A7B51312469DE2');
        $this->addSql('ALTER TABLE category_articles DROP FOREIGN KEY FK_8A7B5131EBAF6CC');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE category_articles');
        $this->addSql('ALTER TABLE articles ADD date_ut DATE DEFAULT NULL');
    }
}
