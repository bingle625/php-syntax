<?php

/** Create Table sessions(
 *  `id` VARCHAR(255) UNIQUE NOT NULL,
 * `payload` TEXT,
 * `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 * `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
 *
 */

ini_set('session.gc_maxlifetime',10);

class DatabaseSessionHandler implements SessionHandlerInterface
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function close()
    {
        return true;
    }

    public function destroy($id)
    {
       return $this->pdo
            ->prepare('DELETE FROM sessions WHERE `id` = :id')
            ->execute([
                ':id' => $id,
            ]);
    }

    public function gc($max_lifetime)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions');
        if ($sth->execute()) {
            while ($row = $sth->fetchObject()) {
                $timestamp = strtotime($row->created_at);
                if (time() - $timestamp > $max_lifetime) {
                    $this->destroy($row->id);
                }
            }
            return true;
        }
        return false;
    }

    public function open($path, $name)
    {
        return true;
    }

    public function read($session_id)
    {
        $sth = $this->pdo->prepare('SELECT * FROM sessions WHERE `id` = :id');
        if ($sth->execute([':id' => $session_id])) {
            if ($sth->rowCount() > 0) {
                $payload = $row->fetchObject()->payload;
            } else{
                $sth = $this->pdo->prepare('INSERT INTO sessions(`id`) VALUES (:id)');
                $sth->execute([':id' => $session_id]);
            }
        }
        return $payload ?? '';
    }

    public function write($id, $data)
    {
        return $this->pdo
            ->prepare('UPDATE sessions SET `payload` = :payload WHERE `id` = :id')
            ->execute([
                ':payload' => $data,
                ':id' => $data,
            ]);
    }
}

session_set_save_handler(new DatabaseSessionHandler(new PDO('mysql:dbname=test-local;host=127.0.0.1;','root','20010310')));

session_start();
session_gc();

$_SESSION['foo'] = 'hello, world';