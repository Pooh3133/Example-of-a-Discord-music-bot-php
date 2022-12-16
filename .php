<?php

// Load the Discord API library

require_once 'discord-api.php';

// Set your Discord bot token and client ID

$bot_token = 'YOUR_BOT_TOKEN';

$client_id = 'YOUR_CLIENT_ID';

// Create a new Discord API client

$client = new DiscordClient($bot_token, $client_id);

// Register a command to play a song

$client->on('!play', function($message, $args) use ($client) {

  // Parse the song URL from the command arguments

  $song_url = $args[0];

  // Find the voice channel the user is in

  $voice_channel = $client->getUserVoiceChannel($message['author']['id']);

  // Join the voice channel

  $client->joinVoiceChannel($voice_channel['id']);

  // Play the song in the voice channel

  $client->playAudio($song_url);

});

// Run the bot

$client->run();

