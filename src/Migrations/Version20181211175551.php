<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211175551 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition ADD team1 VARCHAR(50) NOT NULL, ADD team2 VARCHAR(50) NOT NULL, ADD team3 VARCHAR(50) NOT NULL, ADD team4 VARCHAR(50) NOT NULL, ADD team5 VARCHAR(50) NOT NULL, ADD team6 VARCHAR(50) NOT NULL, ADD team7 VARCHAR(50) NOT NULL, ADD team8 VARCHAR(50) NOT NULL, ADD team9 VARCHAR(50) NOT NULL, ADD team11 VARCHAR(50) NOT NULL, ADD team12 VARCHAR(50) NOT NULL, ADD team13 VARCHAR(50) NOT NULL, ADD team14 VARCHAR(50) NOT NULL, ADD team15 VARCHAR(50) NOT NULL, ADD team16 VARCHAR(50) NOT NULL, ADD team17 VARCHAR(50) NOT NULL, ADD team18 VARCHAR(50) NOT NULL, ADD team19 VARCHAR(50) NOT NULL, ADD team20 VARCHAR(50) NOT NULL, ADD team21 VARCHAR(50) NOT NULL, ADD team22 VARCHAR(50) NOT NULL, ADD team23 VARCHAR(50) NOT NULL, ADD team24 VARCHAR(50) NOT NULL, ADD team25 VARCHAR(50) NOT NULL, ADD team26 VARCHAR(50) NOT NULL, ADD team27 VARCHAR(50) NOT NULL, ADD team28 VARCHAR(50) NOT NULL, ADD team29 VARCHAR(50) NOT NULL, ADD team30 VARCHAR(50) NOT NULL, ADD team31 VARCHAR(50) NOT NULL, ADD team32 VARCHAR(50) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competition DROP team1, DROP team2, DROP team3, DROP team4, DROP team5, DROP team6, DROP team7, DROP team8, DROP team9, DROP team11, DROP team12, DROP team13, DROP team14, DROP team15, DROP team16, DROP team17, DROP team18, DROP team19, DROP team20, DROP team21, DROP team22, DROP team23, DROP team24, DROP team25, DROP team26, DROP team27, DROP team28, DROP team29, DROP team30, DROP team31, DROP team32');
    }
}
