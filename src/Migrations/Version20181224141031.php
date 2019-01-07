<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181224141031 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invitation ADD user_id INT NOT NULL, DROP user');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_F11D61A2A76ED395 ON invitation (user_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invitation DROP FOREIGN KEY FK_F11D61A2A76ED395');
        $this->addSql('DROP INDEX IDX_F11D61A2A76ED395 ON invitation');
        $this->addSql('ALTER TABLE invitation ADD user VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP user_id');
    }
}
