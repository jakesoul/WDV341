<?php

    class Event 
    {
        
        /*
            This class will be used to build an Event object from the wdv341 database of events.
            This provide a standard way of building the Event object
        */

        //properties - one property for each piece of data the object will contain

        public $eventId;
        public $eventName;
        public $eventDescription;
        public $eventPresenter;
        public $eventDate;
        public $eventTime;

        //constructor methods - automatically called when you create a new object from the clas
        function __construct()
        {
            $eventName = "event name";
            $eventDescription = "event description";
            $eventPresenter = "event presenter";
            $eventDate = date_create("2013-03-15");
            $eventTime = date("14:00:00");
        }

        //methods - setters/mutators, getters/accessors, processing functions
        function set_eventId($inId)
        {
            $this->eventId = $inId;
        }

        function get_eventId()
        {
            return $this->eventId;
        }

        function set_eventName($inName)
        {
            $this->eventName = $inName; //sets a new value into the $eventName property
        }

        function get_eventName()
        {
            return $this->eventName;
        }

        function set_eventDescription($inDescription)
        {
            $this->eventDescription = $inDescription;
        }

        function get_eventDescription()
        {
            return $this->eventDescription;
        }

        function set_eventPresenter($inPresenter)
        {
            $this->eventPresenter = $inPresenter;
        }

        function get_eventPresenter()
        {
            return $this->eventPresenter;
        }

        function set_eventDate($inDate)
        {
            $this->eventDate = $inDate;
        }

        function get_eventDate()
        {
            return $this->eventDate;
        }

        function set_eventTime($inTime)
        {
            $this->eventTime = $inTime;
        }

        function get_eventTime()
        {
            return $this->eventTime;
        }

    }
?>