<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200130091841 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE other_screenshoot (id INT AUTO_INCREMENT NOT NULL, screen_shoot_id INT DEFAULT NULL, INDEX IDX_2009C6AC1C4AA902 (screen_shoot_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, screen_shoot VARCHAR(255) DEFAULT NULL, link_url VARCHAR(255) DEFAULT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_technologie (project_id INT NOT NULL, technologie_id INT NOT NULL, INDEX IDX_654EC18F166D1F9C (project_id), INDEX IDX_654EC18F261A27D2 (technologie_id), PRIMARY KEY(project_id, technologie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologie (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE other_screenshoot ADD CONSTRAINT FK_2009C6AC1C4AA902 FOREIGN KEY (screen_shoot_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE project_technologie ADD CONSTRAINT FK_654EC18F166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_technologie ADD CONSTRAINT FK_654EC18F261A27D2 FOREIGN KEY (technologie_id) REFERENCES technologie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE other_screenshoot DROP FOREIGN KEY FK_2009C6AC1C4AA902');
        $this->addSql('ALTER TABLE project_technologie DROP FOREIGN KEY FK_654EC18F166D1F9C');
        $this->addSql('ALTER TABLE project_technologie DROP FOREIGN KEY FK_654EC18F261A27D2');
        $this->addSql('DROP TABLE other_screenshoot');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_technologie');
        $this->addSql('DROP TABLE technologie');
    }
}
