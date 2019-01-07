<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181212223801 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE group_a');
        $this->addSql('ALTER TABLE competition DROP team1, DROP team2, DROP team3, DROP team4, DROP team5, DROP team6, DROP team7, DROP team8, DROP team9, DROP team11, DROP team12, DROP team13, DROP team14, DROP team15, DROP team16, DROP team17, DROP team18, DROP team19, DROP team20, DROP team21, DROP team22, DROP team23, DROP team24, DROP team25, DROP team26, DROP team27, DROP team28, DROP team29, DROP team30, DROP team31, DROP team32, DROP team10');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE group_a (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, competition_id INT NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, match_played INT DEFAULT NULL, win INT DEFAULT NULL, draw INT DEFAULT NULL, loss INT DEFAULT NULL, goals_scored INT DEFAULT NULL, goals_conceded INT DEFAULT NULL, points INT DEFAULT NULL, UNIQUE INDEX UNIQ_8173C9E85E237E06 (name), INDEX IDX_8173C9E87B39D312 (competition_id), INDEX IDX_8173C9E8A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE group_a ADD CONSTRAINT FK_8173C9E87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE group_a ADD CONSTRAINT FK_8173C9E8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE competition ADD team1 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team2 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team3 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team4 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team5 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team6 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team7 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team8 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team9 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team11 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team12 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team13 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team14 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team15 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team16 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team17 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team18 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team19 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team20 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team21 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team22 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team23 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team24 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team25 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team26 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team27 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team28 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team29 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team30 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team31 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team32 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team10 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
