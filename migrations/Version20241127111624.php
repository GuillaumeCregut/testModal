<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241127111624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE quotation (id INT AUTO_INCREMENT NOT NULL, quotation_id VARCHAR(20) NOT NULL, quotation_date DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', validity DATE NOT NULL COMMENT \'(DC2Type:date_immutable)\', state INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quotation_line (id INT AUTO_INCREMENT NOT NULL, quotation_id INT NOT NULL, item_reference_id INT NOT NULL, description LONGTEXT NOT NULL, quantity DOUBLE PRECISION NOT NULL, price DOUBLE PRECISION NOT NULL, vat DOUBLE PRECISION NOT NULL, discount DOUBLE PRECISION NOT NULL, INDEX IDX_4CE011BAB4EA4E60 (quotation_id), INDEX IDX_4CE011BAD91F2368 (item_reference_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE quotation_line ADD CONSTRAINT FK_4CE011BAB4EA4E60 FOREIGN KEY (quotation_id) REFERENCES quotation (id)');
        $this->addSql('ALTER TABLE quotation_line ADD CONSTRAINT FK_4CE011BAD91F2368 FOREIGN KEY (item_reference_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE quotation_line DROP FOREIGN KEY FK_4CE011BAB4EA4E60');
        $this->addSql('ALTER TABLE quotation_line DROP FOREIGN KEY FK_4CE011BAD91F2368');
        $this->addSql('DROP TABLE quotation');
        $this->addSql('DROP TABLE quotation_line');
    }
}
