<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212224845 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competition_teams (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, team VARCHAR(255) NOT NULL, points VARCHAR(255) DEFAULT NULL, macth_played INT DEFAULT NULL, win INT DEFAULT NULL, draw INT NOT NULL, loss INT DEFAULT NULL, goals_scored INT DEFAULT NULL, goals_conceded INT DEFAULT NULL, `group` VARCHAR(32) DEFAULT NULL, INDEX IDX_6575108E7B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competition_teams ADD CONSTRAINT FK_6575108E7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE competition_teams');
    }
}
