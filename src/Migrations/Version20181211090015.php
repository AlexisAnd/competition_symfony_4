<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181211090015 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_a DROP FOREIGN KEY FK_8173C9E87B39D312');
        $this->addSql('DROP INDEX IDX_8173C9E87B39D312 ON group_a');
        $this->addSql('ALTER TABLE group_a CHANGE competition_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE group_a ADD CONSTRAINT FK_8173C9E8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_8173C9E8A76ED395 ON group_a (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE group_a DROP FOREIGN KEY FK_8173C9E8A76ED395');
        $this->addSql('DROP INDEX IDX_8173C9E8A76ED395 ON group_a');
        $this->addSql('ALTER TABLE group_a CHANGE user_id competition_id INT NOT NULL');
        $this->addSql('ALTER TABLE group_a ADD CONSTRAINT FK_8173C9E87B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_8173C9E87B39D312 ON group_a (competition_id)');
    }
}
