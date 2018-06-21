@extends('layouts/app')
@section('class', 'homepage')

@section('content')

<div class="container" style="margin-bottom:100px">
  <h1>Documentation</h1>
  <br>
  <div class="row">
    <div class="col-md-2">
      <ul class="nav flex-column">
        <li class="nav-item"><a href="#intro">Intro</a></li>
        <li class="nav-item"><a href="#story">Story</a></li>
        <li class="nav-item"><a href="#dashboard">Dashboard</a></li>
        <li class="nav-item"><a href="#notes">Notes</a></li>
        <li class="nav-item"><a href="#locations">Locations</a></li>
        <li class="nav-item"><a href="#encounters">Encounters</a></li>
        <li class="nav-item"><a href="#npcs">NPCs</a></li>
        <li class="nav-item"><a href="#party">Party</a></li>
        <li class="nav-item"><a href="#settings">Settings</a></li>
        <li class="nav-item"><a href="#initiative">Initiative Tracker</a></li>
        <li class="nav-item"><a href="#srd">SRD Material</a></li>
      </ul>
    </div>
    <div class="col-md">
      <div id="intro" class="section">
          <h3>Intro</h3>
          <p>RP Admin is an application which makes it easy to manage your RPG campaign. It can be as simple or detailed as you like by simply changing a few settings.</p>
      </div>
    
      <div id="story" class="section">
        <h3>Story</h3>
        <p>I spent a lot of time trying to figure out how to organize my notes in a way that was quick and easy to use. There’s nothing worse than having to stop a gaming session because I’m unprepared or don’t have the information I need readily available.</p>
        <p>After spending some time on Reddit and searching online, I found that there weren’t any good tools to help with this. Most of the answers that I found were based around using bits and pieces of several tools, meaning that you’d have to have a bunch of tabs open on your browser or even multiple applications. </p>            
        <p>RP Admin was designed to prevent this. Although there are different pages to enter and view information, there is also built in functionality to display several of these at once. This means that a lot of custom information is visible at once, which prevents the need for finding tabs or stopping the game to go through a binder.</p>
      </div>

      <div id="dashboard" class="section">
        <h3>Dashboard</h3>
        <p>Your dashboard is an easy access center for anything you’re looking for. At the top of the page is links to your notes, encounters, locations, and NPCs. At the bottom is a list of your active characters for quick reference. As on all pages, your sidebar notes are displayed on the right hand side which can provide links, DM reference, or just things to remember.</p>
      </div>

      <div id="notes" class="section">
          <h3>Notes</h3>
          <p>Notes are exactly what they sound like. They can be notes about whatever you like, whether it be session notes or notes about the campaign setting as a whole, which can be found in one location.</p>
          <ul>
            <li>
                <strong>New:</strong> Simply click on the “New” button at the top of the page to create a new note.
                <ol class="text-secondary">
                  <li>Fill out title</li>
                  <li>Create content using the text editor</li>
                  <li>Add any images related to the note. These could be maps, inspirations, npcs, etc. Simply put URL in the field and click the “+” button to add it. </li>
                  <li>Click Save.</li>
                </ol>
            </li>
            <li>
                <strong>Edit:</strong> To edit a note, click on the title of the note you want to change. At the top of the note page is an “Edit” button. Click this button to begin editing your note.
                <ol class="text-secondary">
                  <li>Edit any fields necessary.</li>
                  <li>Add/remove images from note.</li>
                  <li>Click Save.</li>
                </ol>
            </li>
            <li>
              <strong>View:</strong> To view your note, click on the title of your note. You can then view your full note as well as images listed when the note was last edited.
            </li>
          </ul>
        </div>
      
      <div id="locations" class="section">
        <h3>Locations</h3>
        <p>The locations page is where you can view and edit all of the locations you’ve created for your campaign.</p>
        <ul>
          <li>
            <strong>New:</strong> Simply click on the “New” button at the top of the page to create a new location.
            <ol class="text-secondary">
              <li>Fill out title</li>
              <li>Create content using the text editor</li>
              <li>List any monsters separated by commas (singular, as they’re listed in the Monsters section). These will show in a popup window on the locations page.</li>
              <li>List related encounters by ID separated by commas (ID can be found on the Encounter page). These will show in a popup window on the locations page.</li>
              <li>Add any images related to the location. These could be maps, inspirations, npcs, etc. Simply put URL in the field and click the “+” button to add it. </li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li>
            <strong>Edit:</strong> To edit a location, click on the location you want to change. At the top of the location page is an “Edit” button. Click this button to begin editing your location.
            <ol class="text-secondary">
              <li>Edit any fields necessary.</li>
              <li>Add/remove images from location.</li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li>
              <strong>View:</strong> To view your location notes, it’s as easy as clicking on the name of your location. You can then view all of your notes on that location as well as images, monsters, and encounters listed when the location was last edited.
          </li>
        </ul>
      </div>

      <div id="encounters" class="section">
        <h3>Encounters</h3>
        <p>Encounters represent events in your campaign or adventure. This could be a combat or simply a meeting with an NPC. Encounters can be linked with locations for easy access.</p>
        <ul>
          <li>
              <strong>New:</strong> Simply click on the “New” button at the top of the page to create a new encounter.
              <ol class="text-secondary">
                <li>Fill out title</li>
                <li>Create content using the text editor</li>
                <li>List any monsters separated by commas (singular, as they’re listed in the Monsters section). </li>
                <li>Add any images related to the encounter. These could be maps, inspirations, npcs, etc. Simply put URL in the field and click the “+” button to add it. </li>
                <li>Click Save.</li>
              </ol>
          </li>
          <li>
            <strong>Edit:</strong> To edit an encounter, click on the encounter you want to change. At the top of the encounter page is an “Edit” button. Click this button to begin editing your encounter.
            <ol class="text-secondary">
              <li>Edit any fields necessary.</li>
              <li>Add/remove images from encounter.</li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li>
            <strong>View:</strong> To view your location notes, it’s as easy as clicking on the name of your location. You can then view all of your notes on that location as well as images, monsters, and encounters listed when the location was last edited.
          </li>
        </ul>
      </div>

      <div id="npcs" class="section">
        <h3>NPCs</h3>
        <p>Encounters represent events in your campaign or adventure. This could be a combat or simply a meeting with an NPC. Encounters can be linked with locations for easy access.</p>
        <ul>
          <li>
            <strong>New:</strong> Simply click on the “New” button at the top of the page to create a new encounter.
            <ol class="text-secondary">
              <li>Fill out title</li>
              <li>Create content using the text editor</li>
              <li>List any monsters separated by commas (singular, as they’re listed in the Monsters section). </li>
              <li>Add any images related to the encounter. These could be maps, inspirations, npcs, etc. Simply put URL in the field and click the “+” button to add it. </li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li>
            <strong>Edit:</strong> To edit an encounter, click on the encounter you want to change. At the top of the encounter page is an “Edit” button. Click this button to begin editing your encounter.
            <ol class="text-secondary">
              <li>Edit any fields necessary.</li>
              <li>Add/remove images from encounter.</li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li>
            <strong>View:</strong> To view your encounter notes, click on the name of your encounter. You can then view all of your notes on that encounter as well as images listed when the encounter was last edited.
          </li>
          <li>
            <strong>Linking:</strong> To take full advantage of this tool, you can make note of the ID assigned to the encounter (this can be found on the Encounter index page in the listings or on the Encounter details page below the title) and place that in the “Encounters” section of the Location editor. Doing this will allow you to stay on your location page and view the designated encounter in a popup window, preventing you from losing your spot!
          </li>
        </ul>
      </div>

      <div id="party" class="section">
        <h3>Party</h3>
        <p>Your party consists of the characters your friends are playing. You can keep detailed or general notes depending on your style, keep track of initiative, and reference to their most used stats at a glance.</p>
        <ul>
          <li>
            <strong>New:</strong> Simply click on the “New” button at the top of the page to create a new Character.
            <ol class="text-secondary">
              <li>Fill out name</li>
              <li>Fill in stat fields (the number of stat fields showing can be changed using the instructions <a href="#settings">here</a>)</li>
              <li>Create Character notes using the text editor</li>
              <li>Add any images related to the Character. These could be portraits, inspirations, symbols, etc. Simply put URL in the field and click the “+” button to add it. </li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li>
            <strong>Edit:</strong> To edit an Character, click on the name of the Character you want to change. At the top of the Character page is an “Edit” button. Click this button to begin editing your party member.
            <ol class="text-secondary">
              <li>Edit any fields necessary.</li>
              <li>Add/remove images from Character.</li>
              <li>Click Save.</li>
            </ol>
          </li>
          <li><strong>View:</strong> To view your Character notes, you can just click on the name of your Character. You can then view all of your notes on that Character as well as stats and images listed when the Character was last edited.</li>
        </ul>
      </div>

      <div id="settings" class="section">
        <h3>Settings</h3>
        <p>To access your settings, hover over your name in the top right corner and select “Settings”. On this page you can:</p>
        <ul>
          <li>Change the name on your account</li>
          <li>Update your password</li>
          <li>Change your theme</li>
          <li>Change the amount of detail you see on Character and NPC pages</li>
          <li>Edit your sidebar notes for handy reference</li>
          <li>Delete your account</li>
        </ul>
      </div>

      <div id="initiative" class="section">
        <h3>Initiative Tracker</h3>
        <p>To access the initiative tracker tool, just click the arrow on the right side of your screen. It will slide out a pane which lists the active characters in your party and “DM”. These items can be dragged and dropped in whatever order you’d like to easily keep track of initiative. The items also show each character’s Armor Class, Hit Points, and Passive Perception for quick reference.</p>
      </div>

      <div id="srd" class="section">
        <h3>SRD Material</h3>
        <p>We have also included the SRD content for Monsters and Spells for an easy point of reference. These allow you to search and sort monsters and spells to help find what you’re looking for even faster. Clicking on the name of the monster or spell will bring up that item’s full description.</p>
      </div>
    </div>
  </div>
</div>

@endsection