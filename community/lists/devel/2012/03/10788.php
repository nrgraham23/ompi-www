<?
$subject_val = "Re: [OMPI devel] Openmpi-1.5.3 issue &quot; initialization failure on /dev/ipath (err=23)&quot;";
include("../../include/msg-header.inc");
?>
<!-- received="Thu Mar 29 11:40:47 2012" -->
<!-- isoreceived="20120329154047" -->
<!-- sent="Thu, 29 Mar 2012 11:40:26 -0400" -->
<!-- isosent="20120329154026" -->
<!-- name="Jeffrey Squyres" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] Openmpi-1.5.3 issue &amp;quot; initialization failure on /dev/ipath (err=23)&amp;quot;" -->
<!-- id="D7DC8164-C0E0-4BA7-BB27-5DBBA59A4E98_at_cisco.com" -->
<!-- charset="iso-8859-1" -->
<!-- inreplyto="CAHbsQtTy=VEAF3xq2cGiDjbAOUut3WkSdm_EL9NVOQirsmV5bQ_at_mail.gmail.com" -->
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
<strong>Subject:</strong> Re: [OMPI devel] Openmpi-1.5.3 issue &quot; initialization failure on /dev/ipath (err=23)&quot;<br>
<strong>From:</strong> Jeffrey Squyres (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2012-03-29 11:40:26
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10789.php">Jeffrey Squyres: "[OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>Previous message:</strong> <a href="10787.php">Raju: "Re: [OMPI devel] Openmpi-1.5.3 issue &quot; initialization failure on /dev/ipath (err=23)&quot;"</a>
<li><strong>In reply to:</strong> <a href="10787.php">Raju: "Re: [OMPI devel] Openmpi-1.5.3 issue &quot; initialization failure on /dev/ipath (err=23)&quot;"</a>
<!-- nextthread="start" -->
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I didn't realize from your text that the SHAREDCONTEXTS_MAX value made it work.
<br>
<p>If so, I would assume that is a good solution.  But I don't know for sure; you might well need to contact QLogic and ask.
<br>
<p><p>On Mar 29, 2012, at 11:34 AM, Raju wrote:
<br>
<p><span class="quotelev1">&gt; Hi Jeffrey,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Thanks for that i will contact them... as i mentioned earlier.. OpenMPI developers has provided the solution that we need to set the value for   PSM_SHAREDCONTEXTS_MAX=&quot;some value&quot;....
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; I kept in input file as export   PSM_SHAREDCONTEXTS_MAX=16.. Correct me i have to do it same way or any other ways...
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Regards
</span><br>
<span class="quotelev1">&gt; Raju... 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Thu, Mar 29, 2012 at 8:58 PM, Jeffrey Squyres &lt;jsquyres_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; This looks like a PSM problem (PSM is the layer than runs below Open MPI on QLogic NICs).  You might need to contact QLogic tech support to find out how to solve it.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Mar 29, 2012, at 11:26 AM, Raju wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt; &gt; Hi Ralph,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; I recompiled OMPI with --with-tm  option, but still same issue... I changed the input file as below... Please let me know what i have to fine tune and verify
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; #!/bin/bash
</span><br>
<span class="quotelev2">&gt; &gt; #PBS -N matmul
</span><br>
<span class="quotelev2">&gt; &gt; #PBS -l nodes=1:ppn=1
</span><br>
<span class="quotelev2">&gt; &gt; node=1
</span><br>
<span class="quotelev2">&gt; &gt; ppn=1
</span><br>
<span class="quotelev2">&gt; &gt; nprocs=`expr ${node} \* ${ppn}`
</span><br>
<span class="quotelev2">&gt; &gt; export PSM_SHAREDCONTEXTS_MAX=16
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; mpirun -np ${nprocs} /home/khan/a.out &lt; /home/khan/iter
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Regards,
</span><br>
<span class="quotelev2">&gt; &gt; Raju...
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Thu, Mar 29, 2012 at 8:49 PM, Raju &lt;brajuk_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt; Hi Ralph,
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Thanks for the very quick response, I did compiled with -tm option i am doing now, once it done i will revert back...
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; Thanks
</span><br>
<span class="quotelev2">&gt; &gt; Raju..
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Thu, Mar 29, 2012 at 8:29 PM, Ralph Castain &lt;rhc_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev2">&gt; &gt; One thing stands out right away: why are you specifying a hostfile? Did you remember to configure OMPI with --with-tm so we launch via Torque? If not, then you could hit issues as you are actually attempting to launch via ssh, which has implications on a Torque-based system.
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; On Mar 29, 2012, at 8:51 AM, Raju wrote:
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Hi Team,
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I am using Qlogic Infiniband and Openmpi-1.5.3. I can able to run the jobs by CLI without any issues, but when iam submitting over torque scheduler facing the below issue.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I am facing issue while submitting the jobs through Torque scheduler. Error file is attached
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Overview of the problem:
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; node1.ibab.ac.in.5910Driver initialization failure on /dev/ipath (err=23)
</span><br>
<span class="quotelev3">&gt; &gt;&gt; --------------------------------------------------------------------------
</span><br>
<span class="quotelev3">&gt; &gt;&gt; PSM was unable to open an endpoint. Please make sure that the network link is
</span><br>
<span class="quotelev3">&gt; &gt;&gt; active on the node and the hardware is functioning.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt;   Error: Failure in initializing endpoint
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I gone through the link <a href="http://www.open-mpi.org/community/lists/users/2011/12/17888.php">http://www.open-mpi.org/community/lists/users/2011/12/17888.php</a> for solution, same followed but no luck.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; I exported the value in my input submit script file as export PSM_SHAREDCONTEXTS_MAX=16, and submitted the job.
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Sample inputfile is
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; #!/bin/bash
</span><br>
<span class="quotelev3">&gt; &gt;&gt; #PBS -N matmul
</span><br>
<span class="quotelev3">&gt; &gt;&gt; #PBS -l nodes=1:ppn=1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; node=1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; ppn=1
</span><br>
<span class="quotelev3">&gt; &gt;&gt; nprocs=`expr ${node} \* ${ppn}`
</span><br>
<span class="quotelev3">&gt; &gt;&gt; echo &quot;--- PBS_NODEFILE CONTENT ---&quot;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; cat $PBS_NODEFILE
</span><br>
<span class="quotelev3">&gt; &gt;&gt; export PSM_SHAREDCONTEXTS_MAX=16
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; mpirun -np ${nprocs} --hostfile $PBS_NODEFILE  /home/khan/a.out &lt; /home/khan/iter
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Please let me know I doing correct or not ? and suggest me for best out ?
</span><br>
<span class="quotelev3">&gt; &gt;&gt;
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Regards,
</span><br>
<span class="quotelev3">&gt; &gt;&gt; Bhagya Raju K
</span><br>
<span class="quotelev3">&gt; &gt;&gt; &lt;errfile.txt&gt;_______________________________________________
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel mailing list
</span><br>
<span class="quotelev3">&gt; &gt;&gt; devel_at_[hidden]
</span><br>
<span class="quotelev3">&gt; &gt;&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt;
</span><br>
<span class="quotelev2">&gt; &gt; _______________________________________________
</span><br>
<span class="quotelev2">&gt; &gt; devel mailing list
</span><br>
<span class="quotelev2">&gt; &gt; devel_at_[hidden]
</span><br>
<span class="quotelev2">&gt; &gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; --
</span><br>
<span class="quotelev1">&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; _______________________________________________
</span><br>
<span class="quotelev1">&gt; devel mailing list
</span><br>
<span class="quotelev1">&gt; devel_at_[hidden]
</span><br>
<span class="quotelev1">&gt; <a href="http://www.open-mpi.org/mailman/listinfo.cgi/devel">http://www.open-mpi.org/mailman/listinfo.cgi/devel</a>
</span><br>
<p><p><pre>
-- 
Jeff Squyres
jsquyres_at_[hidden]
For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</pre>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="10789.php">Jeffrey Squyres: "[OMPI devel] RFC: opal_cache_line_size"</a>
<li><strong>Previous message:</strong> <a href="10787.php">Raju: "Re: [OMPI devel] Openmpi-1.5.3 issue &quot; initialization failure on /dev/ipath (err=23)&quot;"</a>
<li><strong>In reply to:</strong> <a href="10787.php">Raju: "Re: [OMPI devel] Openmpi-1.5.3 issue &quot; initialization failure on /dev/ipath (err=23)&quot;"</a>
<!-- nextthread="start" -->
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
