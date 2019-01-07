<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211075526 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE group_a (id INT AUTO_INCREMENT NOT NULL, competition_id INT NOT NULL, name VARCHAR(50) NOT NULL, match_played INT DEFAULT NULL, win INT DEFAULT NULL, draw INT DEFAULT NULL, loss INT DEFAULT NULL, goals_scored INT DEFAULT NULL, goals_conceded INT DEFAULT NULL, points INT DEFAULT NULL, UNIQUE INDEX UNIQ_8173C9E85E237E06 (name), INDEX IDX_8173C9E87B39D312 (competition_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE group_a ADD CONSTRAINT FK_8173C9E87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE group_a');
    }
}
