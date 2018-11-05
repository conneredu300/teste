<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181102203507 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ship_orders (id INT AUTO_INCREMENT NOT NULL, people INT NOT NULL, item INT NOT NULL, address VARCHAR(255) NOT NULL, string VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE ship_order');
        $this->addSql('ALTER TABLE item CHANGE name name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE people CHANGE cellphone cellphone VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE ship_order (id INT AUTO_INCREMENT NOT NULL, people INT NOT NULL, item INT NOT NULL, address VARCHAR(255) NOT NULL COLLATE latin1_swedish_ci, INDEX people (people), INDEX item (item), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ship_order ADD CONSTRAINT ship_order_ibfk_1 FOREIGN KEY (people) REFERENCES people (id)');
        $this->addSql('ALTER TABLE ship_order ADD CONSTRAINT ship_order_ibfk_2 FOREIGN KEY (item) REFERENCES item (id)');
        $this->addSql('DROP TABLE ship_orders');
        $this->addSql('ALTER TABLE item CHANGE name name VARCHAR(50) NOT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE people CHANGE cellphone cellphone VARCHAR(20) NOT NULL COLLATE latin1_swedish_ci');
    }
}
