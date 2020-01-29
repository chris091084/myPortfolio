<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200129104903 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE projects (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, pitcture VARCHAR(255) DEFAULT NULL, comment LONGTEXT DEFAULT NULL, link VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE other_pictures (id INT AUTO_INCREMENT NOT NULL, picture_id INT DEFAULT NULL, INDEX IDX_CB6B5F2DEE45BDBF (picture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE technologies_projects (technologies_id INT NOT NULL, projects_id INT NOT NULL, INDEX IDX_71CA1FD78F8A14FA (technologies_id), INDEX IDX_71CA1FD71EDE0F55 (projects_id), PRIMARY KEY(technologies_id, projects_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE other_pictures ADD CONSTRAINT FK_CB6B5F2DEE45BDBF FOREIGN KEY (picture_id) REFERENCES projects (id)');
        $this->addSql('ALTER TABLE technologies_projects ADD CONSTRAINT FK_71CA1FD78F8A14FA FOREIGN KEY (technologies_id) REFERENCES technologies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE technologies_projects ADD CONSTRAINT FK_71CA1FD71EDE0F55 FOREIGN KEY (projects_id) REFERENCES projects (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE other_pictures DROP FOREIGN KEY FK_CB6B5F2DEE45BDBF');
        $this->addSql('ALTER TABLE technologies_projects DROP FOREIGN KEY FK_71CA1FD71EDE0F55');
        $this->addSql('ALTER TABLE technologies_projects DROP FOREIGN KEY FK_71CA1FD78F8A14FA');
        $this->addSql('DROP TABLE projects');
        $this->addSql('DROP TABLE other_pictures');
        $this->addSql('DROP TABLE technologies');
        $this->addSql('DROP TABLE technologies_projects');
    }
}
