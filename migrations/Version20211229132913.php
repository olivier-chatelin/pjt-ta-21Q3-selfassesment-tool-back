<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211229132913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE checkpoint (id INT AUTO_INCREMENT NOT NULL, curriculum_id INT NOT NULL, name VARCHAR(255) NOT NULL, number INT NOT NULL, duration VARCHAR(255) NOT NULL, global_skills LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_F00F7BE5AEA4428 (curriculum_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE curriculum (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objective (id INT AUTO_INCREMENT NOT NULL, checkpoint_id INT NOT NULL, description VARCHAR(255) NOT NULL, is_bonus TINYINT(1) NOT NULL, number INT NOT NULL, INDEX IDX_B996F101F27C615F (checkpoint_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objective_skill (objective_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_38A9D94473484933 (objective_id), INDEX IDX_38A9D9445585C142 (skill_id), PRIMARY KEY(objective_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, color VARCHAR(7) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE checkpoint ADD CONSTRAINT FK_F00F7BE5AEA4428 FOREIGN KEY (curriculum_id) REFERENCES curriculum (id)');
        $this->addSql('ALTER TABLE objective ADD CONSTRAINT FK_B996F101F27C615F FOREIGN KEY (checkpoint_id) REFERENCES checkpoint (id)');
        $this->addSql('ALTER TABLE objective_skill ADD CONSTRAINT FK_38A9D94473484933 FOREIGN KEY (objective_id) REFERENCES objective (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE objective_skill ADD CONSTRAINT FK_38A9D9445585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE objective DROP FOREIGN KEY FK_B996F101F27C615F');
        $this->addSql('ALTER TABLE checkpoint DROP FOREIGN KEY FK_F00F7BE5AEA4428');
        $this->addSql('ALTER TABLE objective_skill DROP FOREIGN KEY FK_38A9D94473484933');
        $this->addSql('ALTER TABLE objective_skill DROP FOREIGN KEY FK_38A9D9445585C142');
        $this->addSql('DROP TABLE checkpoint');
        $this->addSql('DROP TABLE curriculum');
        $this->addSql('DROP TABLE objective');
        $this->addSql('DROP TABLE objective_skill');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE user');
    }
}
