<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211114253 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE competitionTeams (competition_id INT NOT NULL, team_id INT NOT NULL, INDEX IDX_465E3557B39D312 (competition_id), INDEX IDX_465E355296CD8AE (team_id), PRIMARY KEY(competition_id, team_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE competitionTeams ADD CONSTRAINT FK_465E3557B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('ALTER TABLE competitionTeams ADD CONSTRAINT FK_465E355296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE competition DROP team_1, DROP team_2, DROP team_3, DROP team_4, DROP team_5, DROP team_6, DROP team_7, DROP team_8, DROP team_9, DROP team_10, DROP team_11, DROP team_12, DROP team_13, DROP team_14, DROP team_15, DROP team_16, DROP team_17, DROP team_18, DROP team_19, DROP team_20, DROP team_21, DROP team_22, DROP team_23, DROP team_24, DROP team_25, DROP team_26, DROP team_27, DROP team_28, DROP team_29, DROP team_30, DROP team_31, DROP team_32');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE competitionTeams');
        $this->addSql('ALTER TABLE competition ADD team_1 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_2 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_3 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_4 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_5 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_6 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_7 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_8 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_9 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_10 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_11 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_12 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_13 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_14 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_15 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_16 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_17 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_18 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_19 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_20 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_21 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_22 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_23 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_24 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_25 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_26 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_27 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_28 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_29 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_30 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_31 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci, ADD team_32 VARCHAR(50) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
