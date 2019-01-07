<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211153500 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competitionTeams DROP FOREIGN KEY FK_465E355296CD8AE');
        $this->addSql('ALTER TABLE competitionTeams DROP FOREIGN KEY FK_465E3557B39D312');
        $this->addSql('DROP INDEX IDX_465E355296CD8AE ON competitionTeams');
        $this->addSql('ALTER TABLE competitionTeams DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE competitionTeams CHANGE team_id teams_id INT NOT NULL');
        $this->addSql('ALTER TABLE competitionTeams ADD CONSTRAINT FK_465E355D6365F12 FOREIGN KEY (teams_id) REFERENCES teams (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE competitionTeams ADD CONSTRAINT FK_465E3557B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_465E355D6365F12 ON competitionTeams (teams_id)');
        $this->addSql('ALTER TABLE competitionTeams ADD PRIMARY KEY (competition_id, teams_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE competitionTeams DROP FOREIGN KEY FK_465E355D6365F12');
        $this->addSql('ALTER TABLE competitionTeams DROP FOREIGN KEY FK_465E3557B39D312');
        $this->addSql('DROP INDEX IDX_465E355D6365F12 ON competitionTeams');
        $this->addSql('ALTER TABLE competitionTeams DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE competitionTeams CHANGE teams_id team_id INT NOT NULL');
        $this->addSql('ALTER TABLE competitionTeams ADD CONSTRAINT FK_465E355296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
        $this->addSql('ALTER TABLE competitionTeams ADD CONSTRAINT FK_465E3557B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_465E355296CD8AE ON competitionTeams (team_id)');
        $this->addSql('ALTER TABLE competitionTeams ADD PRIMARY KEY (competition_id, team_id)');
    }
}
