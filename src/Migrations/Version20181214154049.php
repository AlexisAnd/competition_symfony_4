<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181214154049 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE matches_group (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, team1 VARCHAR(50) NOT NULL, team2 VARCHAR(50) NOT NULL, score_team1 INT NOT NULL, score_team2 INT NOT NULL, `group` VARCHAR(50) NOT NULL, due_date DATETIME NOT NULL, played TINYINT(1) NOT NULL, INDEX IDX_757D0CE87B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matches_group ADD CONSTRAINT FK_757D0CE87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE matches_group');
    }
}
