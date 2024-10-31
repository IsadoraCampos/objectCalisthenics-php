<?php

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;
use Alura\Calisthenics\Domain\Email\Email;

class Student
{
    private Email $email;
    private DateTimeInterface $birthDate;
    private WatchedVideos $watchedVideos;
    private Name $name;
    private Adress $adress;


    public function __construct(Email $email, DateTimeInterface $birthDate, Name $name, Adress $adress)
    {
        $this->watchedVideos = new WatchedVideos();
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->name = $name;
        $this->adress = $adress;
    }

    public function email() : Email{
        return $this->email;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function adress(): Adress
    {
        return $this->adress;
    }
    public function birthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
       $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
          return true;
        }

       $firstDate = $this->watchedVideos->dateOfFirstVideo();
       $today = new \DateTimeImmutable();
       return $firstDate->diff($today)->days < 90;
    }

    public function age() : int
    {
        $today = new \DateTimeImmutable();
        return $this->birthDate->diff($today)->y;
    }

    public function send($msg) {
        mail($this->email, "Assunto", $msg);
    }
}
