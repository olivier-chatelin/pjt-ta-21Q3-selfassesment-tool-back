<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220109154200 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE result ADD checkpoint_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE result ADD CONSTRAINT FK_136AC113F27C615F FOREIGN KEY (checkpoint_id) REFERENCES checkpoint (id)');
        $this->addSql('CREATE INDEX IDX_136AC113F27C615F ON result (checkpoint_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE result DROP FOREIGN KEY FK_136AC113F27C615F');
        $this->addSql('DROP INDEX IDX_136AC113F27C615F ON result');
        $this->addSql('ALTER TABLE result DROP checkpoint_id');
    }
}
