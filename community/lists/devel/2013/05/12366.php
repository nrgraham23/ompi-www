<?
$subject_val = "[OMPI devel] Fwd: Q: project based MCA param files";
include("../../include/msg-header.inc");
?>
<!-- received="Tue May  7 09:28:41 2013" -->
<!-- isoreceived="20130507132841" -->
<!-- sent="Tue, 7 May 2013 13:28:35 +0000" -->
<!-- isosent="20130507132835" -->
<!-- name="Jeff Squyres (jsquyres)" -->
<!-- email="jsquyres_at_[hidden]" -->
<!-- subject="[OMPI devel] Fwd: Q: project based MCA param files" -->
<!-- id="EF66BBEB19BADC41AC8CCF5F684F07FC4F60AA75_at_xmb-rcd-x01.cisco.com" -->
<!-- charset="us-ascii" -->
<!-- inreplyto="3292529D-0F2E-4A33-AA3B-ECA37350B3B1_at_ornl.gov" -->
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
<strong>Subject:</strong> [OMPI devel] Fwd: Q: project based MCA param files<br>
<strong>From:</strong> Jeff Squyres (jsquyres) (<em>jsquyres_at_[hidden]</em>)<br>
<strong>Date:</strong> 2013-05-07 09:28:35
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="12367.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r28456 - trunk"</a>
<li><strong>Previous message:</strong> <a href="12365.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn] svn:open-mpi r28456 - trunk"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="12368.php">Ralph Castain: "Re: [OMPI devel] Q: project based MCA param files"</a>
<li><strong>Reply:</strong> <a href="12368.php">Ralph Castain: "Re: [OMPI devel] Q: project based MCA param files"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
Given Ralph's questions about r<a href="https://svn.open-mpi.org/trac/ompi/changeset/28456">https://svn.open-mpi.org/trac/ompi/changeset/28456</a>, ORNL's second question to me/Nathan about MCA params is probably worth forwarding to the list -- see below.
<br>
<p>Thoughts on this proposal?
<br>
<p><p>Begin forwarded message:
<br>
<p><span class="quotelev1">&gt; From: &quot;Boehm, Swen&quot; &lt;bohms_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Subject: Re: Q: project based MCA param files
</span><br>
<span class="quotelev1">&gt; Date: May 3, 2013 5:03:43 PM EDT
</span><br>
<span class="quotelev1">&gt; To: &quot;Jeff Squyres (jsquyres)&quot; &lt;jsquyres_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; Cc: Nathan Hjelm &lt;hjelmn_at_[hidden]&gt;, &quot;Vallee, Geoffroy R.&quot; &lt;valleegr_at_[hidden]&gt;, &quot;Naughton III, Thomas J.&quot; &lt;naughtont_at_[hidden]&gt;
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Hi Jeff,
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; Here is a short description of the enhancement we would like to contribute.
</span><br>
<span class="quotelev1">&gt; Let us know what you think.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The purpose of the suggested improvements is to enable &quot;projects&quot; to read
</span><br>
<span class="quotelev1">&gt; MCA parameters from project specific locations. This enables the usage
</span><br>
<span class="quotelev1">&gt; of OPAL and the MCA Frameworks outside the OpenMPI project without
</span><br>
<span class="quotelev1">&gt; interfering with OpenMPI specific parameters and removes the need to 
</span><br>
<span class="quotelev1">&gt; patch OPAL (e.g., to pick up params from different locations).
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The possible scenarios would be the following:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; a) adding the option to pick up a project specific mca-param.conf file
</span><br>
<span class="quotelev1">&gt;   Example:
</span><br>
<span class="quotelev1">&gt;            $HOME/.mca/${project}-mca-param.conf
</span><br>
<span class="quotelev1">&gt;    and     /etc/mca/${project}-mca-param.conf)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; b) add the option to pick up the mca-param.conf file from a project specific
</span><br>
<span class="quotelev1">&gt;   directory
</span><br>
<span class="quotelev1">&gt;   Example:
</span><br>
<span class="quotelev1">&gt;            $HOME/.${project}/mca-param.conf
</span><br>
<span class="quotelev1">&gt;    and     /etc/${project}/mca-param.conf
</span><br>
<span class="quotelev1">&gt;    and/or  /etc/${project}/${project}-mca-param.conf)
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; c) prefixing the mca param with the project name in the existing mca-param.conf
</span><br>
<span class="quotelev1">&gt;   file and therefore following the new MCA variable system naming scheme.
</span><br>
<span class="quotelev1">&gt;   Example:
</span><br>
<span class="quotelev1">&gt;            mca_${project}_${framework}_${component}_${var_name}
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; The implementation has to be compatible with the current system, that is, 
</span><br>
<span class="quotelev1">&gt; it should work as it does today without any added burden to the user. The
</span><br>
<span class="quotelev1">&gt; suggested approach is to provide an addition to the MCA API (something like
</span><br>
<span class="quotelev1">&gt; mca_base_add_config_file_path ()) to add lookup paths to the MCA system.
</span><br>
<span class="quotelev1">&gt; This way additional files can be picked up for the MCA param parsing if
</span><br>
<span class="quotelev1">&gt; needed.
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; To wrap it up:
</span><br>
<span class="quotelev1">&gt; 1) Is the motivation clear?
</span><br>
<span class="quotelev1">&gt; 2) Is it possible to implement the desired capability within a
</span><br>
<span class="quotelev1">&gt;    reasonable time and without changing the current behavior?
</span><br>
<span class="quotelev1">&gt; 3) Does it line up with the planning / future capabilities?
</span><br>
<span class="quotelev1">&gt; 4) Which of the above options (A, B, C) would you prefer?
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; -- 
</span><br>
<span class="quotelev1">&gt; Swen Boehm                                      | Email: bohms_at_[hidden]
</span><br>
<span class="quotelev1">&gt; Oak Ridge National Laboratory      | Phone: +1 865-576-6125
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev1">&gt; On Apr 26, 2013, at 7:50 PM, Thomas Naughton &lt;naughtont_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Hi,
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Ok, sounds good. We'll check on this next week and get back to you.
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; Thanks,
</span><br>
<span class="quotelev2">&gt;&gt; --tjn
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; _________________________________________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;  Thomas Naughton                                      naughtont_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;  Research Associate                                   (865) 576-4184
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt; On Fri, 26 Apr 2013, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev2">&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Email would probably be easiest -- I will need to page in/refresh this area of the code, anyway, so if you guys do the initial homework and submit some ideas, that would probably be easiest (For me).  :-D
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; On Apr 26, 2013, at 6:33 PM, Thomas Naughton &lt;naughtont_at_[hidden]&gt;
</span><br>
<span class="quotelev3">&gt;&gt;&gt; wrote:
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Hi Jeff,
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; We don't have one yet but we can code something up and submit a patch.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; If useful we could quickly sync up beforehand to ensure we are on the same page.   Phone or email, whatever would be easiest.
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; What do you think?
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; --tjn
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; _________________________________________________________________________
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Thomas Naughton                                      naughtont_at_[hidden]
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; Research Associate                                   (865) 576-4184
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; On Fri, 26 Apr 2013, Jeff Squyres (jsquyres) wrote:
</span><br>
<span class="quotelev4">&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; I'm not aware of any plans to do this.
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Do you guys have a patch to submit, perchance?  :-D
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; On Apr 22, 2013, at 6:30 PM, Thomas Naughton &lt;naughtont_at_[hidden]&gt; wrote:
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Hi Nathan &amp; Jeff,
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; You guys have done some MCA updates lately and we were curious if there are
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; any plans or thoughts about an enhancement regarding MCA param files.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Briefly speaking, we were curious if there were plans for either having
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; project specific MCA param files, or having a generic mca param file that
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; would use the projects as part of the namespace.  I think an example would
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; help clarify.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; We currently change things to have &quot;$HOME/.stci/mca-params.conf&quot;.  This is
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; pretty much the only remaining modification we have for OPAL after recent
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; updates.  If there was a way to have something like
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; &quot;$HOME/.${project}/mca-params.conf&quot;, or
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; &quot;$HOME/.mca/${project}-mca-params.conf&quot;, it would remove this remaining customization we do to OPAL.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; This sort of thing seems like it could be a useful if OPAL became
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; stand-alone in the future -- it seems like you guys might be moving that
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; way?
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; We didn't know if you guys had plans for anything related to this and/or if
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; you'd be receptive to changes to support something along this line.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; We would be very interested to get your comments/thoughts.
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Thanks,
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; --tjn
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; _________________________________________________________________________
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Thomas Naughton                                      naughtont_at_[hidden]
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; Research Associate                                   (865) 576-4184
</span><br>
<span class="quotelev2">&gt;&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; --
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt;&gt;&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; -- 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; Jeff Squyres
</span><br>
<span class="quotelev3">&gt;&gt;&gt; jsquyres_at_[hidden]
</span><br>
<span class="quotelev3">&gt;&gt;&gt; For corporate legal information go to: <a href="http://www.cisco.com/web/about/doing_business/legal/cri/">http://www.cisco.com/web/about/doing_business/legal/cri/</a>
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev3">&gt;&gt;&gt; 
</span><br>
<span class="quotelev1">&gt; 
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
<li><strong>Next message:</strong> <a href="12367.php">Ralph Castain: "Re: [OMPI devel] [OMPI svn] svn:open-mpi r28456 - trunk"</a>
<li><strong>Previous message:</strong> <a href="12365.php">Jeff Squyres (jsquyres): "Re: [OMPI devel] [OMPI svn] svn:open-mpi r28456 - trunk"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="12368.php">Ralph Castain: "Re: [OMPI devel] Q: project based MCA param files"</a>
<li><strong>Reply:</strong> <a href="12368.php">Ralph Castain: "Re: [OMPI devel] Q: project based MCA param files"</a>
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
