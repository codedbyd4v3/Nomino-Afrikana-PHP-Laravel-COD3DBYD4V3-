<?php
/*
 * © 2025 David Parsley
 * This code is not licensed for production use unless payment has been made.
 * Contact: davidparsley.kakhayanga@gmail.com
 */

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Discography;
use App\Models\Video;
use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ---- Users ----
        $user = User::create([
            'name' => 'Dave',
            'email' => 'davidparsley@example.com',
            'password' => Hash::make('123456'),
        ]);
        $this->command->info("🚀 Seeded user: {$user->name} - {$user->email}");

        // ---- Discography ----
        $discographyItems = [
            [
                'title' => 'Ancestral Echoes',
                'category' => 'album',
                'cover_image' => 'https://images.unsplash.com/photo-1511379938547-c1f69419868d',
                'release_date' => '2023-08-15',
                'description' => 'A profound exploration of traditional African rhythms and contemporary musical expression, weaving together sounds from across the African diaspora.',
                'spotify_url' => 'https://open.spotify.com/album/ancestral-echoes',
                'youtube_url' => 'https://youtube.com/playlist?list=ancestral-echoes',
                'apple_music_url' => 'https://music.apple.com/album/ancestral-echoes'
            ],
            [
                'title' => 'Savannah Dreams',
                'category' => 'album',
                'cover_image' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f',
                'release_date' => '2022-05-20',
                'description' => 'An atmospheric journey through the sounds of the African savannah, blending traditional instruments with modern production.',
                'spotify_url' => 'https://open.spotify.com/album/savannah-dreams',
                'youtube_url' => 'https://youtube.com/playlist?list=savannah-dreams',
                'apple_music_url' => 'https://music.apple.com/album/savannah-dreams'
            ],
            [
                'title' => 'Desert Caravan',
                'category' => 'single',
                'cover_image' => 'https://images.unsplash.com/photo-1571330735066-03aaa9429d89',
                'release_date' => '2024-01-10',
                'description' => 'A rhythmic single inspired by ancient trade routes across the Sahara.',
                'spotify_url' => 'https://open.spotify.com/track/desert-caravan',
                'youtube_url' => 'https://youtube.com/watch?v=desert-caravan',
                'apple_music_url' => 'https://music.apple.com/song/desert-caravan'
            ],
            [
                'title' => 'Golden Sun',
                'category' => 'single',
                'cover_image' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745',
                'release_date' => '2023-11-05',
                'description' => 'An uplifting track celebrating the warmth and energy of African sunlight.',
                'spotify_url' => 'https://open.spotify.com/track/golden-sun',
                'youtube_url' => 'https://youtube.com/watch?v=golden-sun',
                'apple_music_url' => null
            ],
        ];

        foreach ($discographyItems as $item) {
            $disc = Discography::create($item);
            $this->command->info("🎵 Seeded discography: {$disc->title} ({$disc->category})");
        }

        // ---- Videos ----
        $videos = [
            [
                'title' => 'Ancestral Echoes - Behind the Music',
                'thumbnail' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618',
                'youtube_url' => 'https://youtube.com/watch?v=behind-ancestral-echoes',
                'description' => "Go behind the scenes of the making of 'Ancestral Echoes' album."
            ],
            [
                'title' => 'Nomino Afrikana - Live at Afrofest 2024',
                'thumbnail' => 'https://images.unsplash.com/photo-1506157786151-b8491531f063',
                'youtube_url' => 'https://youtube.com/watch?v=live-afrofest-2024',
                'description' => 'Full concert performance from Afrofest Nairobi 2024.'
            ],
            [
                'title' => 'Desert Caravan - Official Music Video',
                'thumbnail' => 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f',
                'youtube_url' => 'https://youtube.com/watch?v=desert-caravan-video',
                'description' => "Official music video for 'Desert Caravan' single."
            ],
        ];

        foreach ($videos as $video) {
            $v = Video::create($video);
            $this->command->info("🎬 Seeded video: {$v->title}");
        }

        // ---- Events ----
        $eventsData = [
            [
                'title' => 'Afrobeat Festival 2025',
                'event_type' => 'festival',
                'date' => '2025-12-10',
                'location' => 'Nairobi, Kenya',
                'description' => 'A vibrant celebration of Afrobeat music featuring top artists from across Africa.',
                'image' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3'
            ],
            [
                'title' => 'Traditional Rhythms Workshop',
                'event_type' => 'workshop',
                'date' => '2025-11-05',
                'location' => 'Mombasa, Kenya',
                'description' => 'Learn traditional African rhythms and their modern applications in contemporary music.',
                'image' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4'
            ],
            [
                'title' => 'Ancestral Echoes Album Tour',
                'event_type' => 'concert',
                'date' => '2024-10-20',
                'location' => 'Lagos, Nigeria',
                'description' => "Special performance featuring the complete 'Ancestral Echoes' album live.",
                'image' => 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea'
            ],
            [
                'title' => 'Cultural Exchange Concert',
                'event_type' => 'concert',
                'date' => '2024-09-15',
                'location' => 'Accra, Ghana',
                'description' => 'A night of cultural exchange through music with local and international artists.',
                'image' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745'
            ],
        ];

        $events = [];
        foreach ($eventsData as $event) {
            $e = Event::create($event);
            $this->command->info("📅 Seeded event: {$e->title} ({$e->event_type})");
            $events[] = $e;
        }

        // ---- Gallery ----
        $galleryItems = [
            [
                'image_url' => 'https://images.unsplash.com/photo-1506157786151-b8491531f063',
                'caption' => 'Energetic live performance at Afrofest 2024',
                'category' => 'performance',
                'event_id' => $events[0]->id
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618',
                'caption' => 'Studio session for Ancestral Echoes album',
                'category' => 'behind_the_scenes',
                'event_id' => null
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4',
                'caption' => 'Traditional djembe drums used in recordings',
                'category' => 'instruments',
                'event_id' => null
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1459749411175-04bf5292ceea',
                'caption' => 'Crowd interaction during Lagos concert',
                'category' => 'performance',
                'event_id' => $events[2]->id
            ],
            [
                'image_url' => 'https://images.unsplash.com/photo-1533174072545-7a4b6ad7a6c3',
                'caption' => 'Festival stage setup and lighting',
                'category' => 'behind_the_scenes',
                'event_id' => $events[0]->id
            ],
        ];

        foreach ($galleryItems as $item) {
            $g = Gallery::create($item);
            $this->command->info("🖼️ Seeded gallery: {$g->caption} ({$g->category})");
        }
    }
}
