<? include("../../include/msg-header.inc"); ?>
<!-- received="Thu Apr 20 11:40:31 2006" -->
<!-- isoreceived="20060420154031" -->
<!-- sent="Thu, 20 Apr 2006 09:40:27 -0600" -->
<!-- isosent="20060420154027" -->
<!-- name="Ralph Castain" -->
<!-- email="rhc_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] opal_event_loop exiting" -->
<!-- id="4447AB6B.1030705_at_lanl.gov" -->
<!-- charset="ISO-8859-1" -->
<!-- inreplyto="187D7A85-41DA-4DBE-8355-BD2D8113879D_at_open-mpi.org" -->
<!-- expires="-1" -->
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<p class="headers">
<strong>From:</strong> Ralph Castain (<em>rhc_at_[hidden]</em>)<br>
<strong>Date:</strong> 2006-04-20 11:40:27
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0832.php">Ralph Castain: "Re: [OMPI devel] opal_event_loop exiting"</a>
<li><strong>Previous message:</strong> <a href="0830.php">Brian Barrett: "Re: [OMPI devel] opal_event_loop exiting"</a>
<li><strong>In reply to:</strong> <a href="0830.php">Brian Barrett: "Re: [OMPI devel] opal_event_loop exiting"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0833.php">Greg Watson: "Re: [OMPI devel] opal_event_loop exiting"</a>
<li><strong>Reply:</strong> <a href="0833.php">Greg Watson: "Re: [OMPI devel] opal_event_loop exiting"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<head>
  <meta content="text/html;charset=ISO-8859-1" http-equiv="Content-Type">
</head>
<body bgcolor="#ffffff" text="#000000">
Well, I actually don't know much about opal_event_loop and/or how it is
intended to work. My guess is that:<br>
<br>
(a) your remote orted is acting as the seed and your local process (the
one in Eclipse) is running as a client to that seed - at least, that
was the case last I talked to Nathan<br>
<br>
(b) when the seed orted dies, it is the oob in your local client that
actually detects socket closure and decides that - since it is the seed
that has lost contact - the local application must abort.<br>
<br>
(c) the errmgr.abort function does exactly what it was supposed to do -
it provides an immediate way of killing the local process.<br>
<br>
I'd be a little hesitant to recommend overloading the errmgr.abort
function as you really do want the local processes to die when losing
connection to the seed (at least, until we develop a recovery
capability for the seed orted - which is some ways off), and (given the
way you are running) I'm not sure you can have a different errmgr for
your process while leaving the other one for everyone else.<br>
<br>
Probably the best solution for now would be for us to insert a (yet
another) MCA parameter into the errmgr that would (if set) have
errmgr.abort do something other than exit. The question then is: what
would you want it to do?? We need to have it tell the rest of the
system to stop trying to send messages etc - right now, I don't think
the infrastructure exists to do that short of killing orte.<br>
<br>
We could try to have errmgr.abort do an orte_finalize - that would kill
the orte system without impacting your host program, I suspect. You
would then have to re-initialize, so we'd have to find some way to let
you know that we had finalized. I can't swear this will work, though -
we might well generate a segfault since this is happening deep down
inside the system. We could try it, though.<br>
<br>
Would any of that be of help? Do you have any suggestions on how we
might let you know that we had finalized?<br>
<br>
Ralph<br>
<br>
<br>
Brian Barrett wrote:
<blockquote cite="mid187D7A85-41DA-4DBE-8355-BD2D8113879D@open-mpi.org"
 type="cite">
  <pre wrap="">On Apr 19, 2006, at 4:15 PM, Greg Watson wrote:

  </pre>
  <blockquote type="cite">
    <pre wrap="">We've just run across a rather tricky issue. We're calling
opal_event_loop() to dispatch orte events to an orted that has been
launched separately. However if the orted dies for some reason (gets
a signal or whatever) then opal_event_loop() is calling exit().
Needless to say, this is not good behavior us. Any suggestions on how
to get around this problem?
    </pre>
  </blockquote>
  <pre wrap=""><!---->
Is the orted you are connecting to the "seed" daemon?  I think the  
only time we should be exiting like that is if the orted was the seed  
daemon.  I'm not sure what we want to do if that's the case -- it  
looks like we're calling errmgr.abort() when badness happens.  I  
wonder if your application can provide its own errmgr component that  
provides an abort that doesn't actually abort?  Just some off the  
cuff ideas -- Ralph could probably give a better idea of exactly what  
is happening...


Brian

  </pre>
</blockquote>
</body>

<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="0832.php">Ralph Castain: "Re: [OMPI devel] opal_event_loop exiting"</a>
<li><strong>Previous message:</strong> <a href="0830.php">Brian Barrett: "Re: [OMPI devel] opal_event_loop exiting"</a>
<li><strong>In reply to:</strong> <a href="0830.php">Brian Barrett: "Re: [OMPI devel] opal_event_loop exiting"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="0833.php">Greg Watson: "Re: [OMPI devel] opal_event_loop exiting"</a>
<li><strong>Reply:</strong> <a href="0833.php">Greg Watson: "Re: [OMPI devel] opal_event_loop exiting"</a>
<!-- reply="end" -->
</ul>
<div class="center">
<table border="2" width="100%" class="links">
<tr>
<th><a href="date.php">Date view</a></th>
<th><a href="index.php">Thread view</a></th>
<th><a href="subject.php">Subject view</a></th>
<th><a href="author.php">Author view</a></th>
</tr>
</table>
</div>
<!-- trailer="footer" -->
<? include("../../include/msg-footer.inc") ?>
