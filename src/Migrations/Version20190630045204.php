<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190630045204 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mark (id CHAR(36) NOT NULL COMMENT \'Идентификатор метки\', latitude NUMERIC(9, 6) NOT NULL COMMENT \'Широта, на которой установлена метка\', longitude NUMERIC(9, 6) NOT NULL COMMENT \'Долгота, на которой установлена метка\', comment LONGTEXT NOT NULL COMMENT \'Комментарий, оставленный к метке\', publication_date DATETIME NOT NULL COMMENT \'Дата публикации метки\', updating_date DATETIME NOT NULL COMMENT \'Дата обновления метки\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE mark');
    }
}
