<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181210114446 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competition (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, team_1 VARCHAR(50) NOT NULL, team_2 VARCHAR(50) NOT NULL, team_3 VARCHAR(50) NOT NULL, team_4 VARCHAR(50) NOT NULL, team_5 VARCHAR(50) NOT NULL, team_6 VARCHAR(50) NOT NULL, team_7 VARCHAR(50) NOT NULL, team_8 VARCHAR(50) NOT NULL, team_9 VARCHAR(50) NOT NULL, team_10 VARCHAR(50) NOT NULL, team_11 VARCHAR(50) NOT NULL, team_12 VARCHAR(50) NOT NULL, team_13 VARCHAR(50) NOT NULL, team_14 VARCHAR(50) NOT NULL, team_15 VARCHAR(50) NOT NULL, team_16 VARCHAR(50) NOT NULL, team_17 VARCHAR(50) NOT NULL, team_18 VARCHAR(50) NOT NULL, team_19 VARCHAR(50) NOT NULL, team_20 VARCHAR(50) NOT NULL, team_21 VARCHAR(50) NOT NULL, team_22 VARCHAR(50) NOT NULL, team_23 VARCHAR(50) NOT NULL, team_24 VARCHAR(50) NOT NULL, team_25 VARCHAR(50) NOT NULL, team_26 VARCHAR(50) NOT NULL, team_27 VARCHAR(50) NOT NULL, team_28 VARCHAR(50) NOT NULL, team_29 VARCHAR(50) NOT NULL, team_30 VARCHAR(50) NOT NULL, team_31 VARCHAR(50) NOT NULL, team_32 VARCHAR(50) NOT NULL, created_on DATETIME NOT NULL, completed_on DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE competition');
    }
}
