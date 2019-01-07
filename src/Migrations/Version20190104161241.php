<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190104161241 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invitation ADD competition_id INT NOT NULL, ADD token VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A27B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_F11D61A27B39D312 ON invitation (competition_id)');
        $this->addSql('ALTER TABLE player ADD competition_id INT NOT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A657B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_98197A657B39D312 ON player (competition_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A27B39D312');
        $this->addSql('DROP INDEX IDX_F11D61A27B39D312 ON invitation');
        $this->addSql('ALTER TABLE invitation DROP competition_id, DROP token');
        $this->addSql('ALTER TABLE player DROP FOREIGN KEY FK_98197A657B39D312');
        $this->addSql('DROP INDEX IDX_98197A657B39D312 ON player');
        $this->addSql('ALTER TABLE player DROP competition_id');
    }
}
