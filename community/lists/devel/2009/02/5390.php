<?
$subject_val = "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*";
include("../../include/msg-header.inc");
?>
<!-- received="Tue Feb 10 16:03:50 2009" -->
<!-- isoreceived="20090210210350" -->
<!-- sent="Tue, 10 Feb 2009 16:03:45 -0500 (EST)" -->
<!-- isosent="20090210210345" -->
<!-- name="Brian W. Barrett" -->
<!-- email="brbarret_at_[hidden]" -->
<!-- subject="Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*" -->
<!-- id="alpine.DEB.1.10.0902101603140.16442_at_marvin.we-be-smart.org" -->
<!-- charset="US-ASCII" -->
<!-- inreplyto="C5B753A4.DE3%koenig_at_ornl.gov" -->
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
<strong>Subject:</strong> Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*<br>
<strong>From:</strong> Brian W. Barrett (<em>brbarret_at_[hidden]</em>)<br>
<strong>Date:</strong> 2009-02-10 16:03:45
</p>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5391.php">Ralph Castain: "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<li><strong>Previous message:</strong> <a href="5389.php">Greg Koenig: "[OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<li><strong>In reply to:</strong> <a href="5389.php">Greg Koenig: "[OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5391.php">Ralph Castain: "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<li><strong>Reply:</strong> <a href="5391.php">Ralph Castain: "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<!-- reply="end" -->
</ul>
<hr>
<!-- body="start" -->
<p>
I have no objections to this change
<br>
<p>Brian
<br>
<p><p>On Tue, 10 Feb 2009, Greg Koenig wrote:
<br>
<p><span class="quotelev1">&gt; RFC: Rename several OMPI_* names to OPAL_*
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHAT: Rename several #define values that encode the prefix &quot;OMPI_&quot; to
</span><br>
<span class="quotelev1">&gt; instead encode the prefix &quot;OPAL_&quot; throughout the entire Open MPI source code
</span><br>
<span class="quotelev1">&gt; tree.  Also, eliminate unnecessary #include lines from source code files
</span><br>
<span class="quotelev1">&gt; under the &quot;.../ompi/mca/btl&quot; subtree.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHY: (1) These are general source code improvements that update #define
</span><br>
<span class="quotelev1">&gt; values to more accurately describe which layer the values belong and remove
</span><br>
<span class="quotelev1">&gt; unnecessary dependencies within the source code; (2) These changes will help
</span><br>
<span class="quotelev1">&gt; with the effort to move the BTL code into an independent layer.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHERE: 1.4 trunk
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; WHEN: Negotiable -- see below, but probably near split for 1.4
</span><br>
<span class="quotelev1">&gt;      (No earlier than February 19, 2009)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Timeout: February 19, 2009
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; ====================================
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; The proposed change involves renaming several #define values that encode the
</span><br>
<span class="quotelev1">&gt; prefix &quot;OMPI_&quot; to instead encode the prefix &quot;OPAL_&quot; throughout the entire
</span><br>
<span class="quotelev1">&gt; Open MPI source code tree.  These names are holdovers from when the three
</span><br>
<span class="quotelev1">&gt; existing layers of Open MPI were developed together prior to being split
</span><br>
<span class="quotelev1">&gt; apart.  Additionally, the proposed change eliminates a few unnecessary
</span><br>
<span class="quotelev1">&gt; #include lines in BTL source code files under the .../ompi/mca/btl subtree.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Specific modifications are detailed following this message text.  A script
</span><br>
<span class="quotelev1">&gt; to carry out these modifications is also attached to this message (gzipped
</span><br>
<span class="quotelev1">&gt; to pass unmolested through the ORNL e-mail server).
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; We believe these modifications improve the Open MPI source code by renaming
</span><br>
<span class="quotelev1">&gt; values such that they correspond to the Open MPI layer to which they most
</span><br>
<span class="quotelev1">&gt; closely belong, and that this improvement is itself of benefit to Open MPI.
</span><br>
<span class="quotelev1">&gt; These modifications will also aid our ongoing efforts to extract the BTL
</span><br>
<span class="quotelev1">&gt; code into a new layer (&quot;ONET&quot;) that can be built with just direct dependence
</span><br>
<span class="quotelev1">&gt; on the OPAL layer.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Although these changes are simple string substitutions, they touch a fair
</span><br>
<span class="quotelev1">&gt; amount of code in the Open MPI tree.  Three people have tested these changes
</span><br>
<span class="quotelev1">&gt; at our site on various platforms and have not discovered any problems.
</span><br>
<span class="quotelev1">&gt; However, we recognize that some members of the community may have
</span><br>
<span class="quotelev1">&gt; input/feedback regarding testing and we remain open to suggestions related
</span><br>
<span class="quotelev1">&gt; to testing.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; One challenge that has been brought up regarding this RFC is that applying
</span><br>
<span class="quotelev1">&gt; patches and/or CMRs to the source code tree after the proposed changes are
</span><br>
<span class="quotelev1">&gt; performed will be more difficult.  To that end, the best opportunity to
</span><br>
<span class="quotelev1">&gt; apply the modifications proposed in this RFC seems to be in conjunction with
</span><br>
<span class="quotelev1">&gt; 1.4.  (My understanding from the developer conference call this morning is
</span><br>
<span class="quotelev1">&gt; that there are a few other changes waiting for this switch as well.)  We are
</span><br>
<span class="quotelev1">&gt; open to suggestions about the best time to apply this RFC to avoid major
</span><br>
<span class="quotelev1">&gt; disruptions.
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; Specific changes follow:
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../configure.ac.
</span><br>
<span class="quotelev1">&gt;     * OMPI_NEED_C_BOOL
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_WEAK_SYMBOLS
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_HAVE_WEAK_SYMBOLS
</span><br>
<span class="quotelev1">&gt;     * OMPI_USE_STDBOOL_H
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_SA_RESTART
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_VA_COPY
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_UNDERSCORE_VA_COPY
</span><br>
<span class="quotelev1">&gt;     * OMPI_PTRDIFF_TYPE
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_ptrdiff_t)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ALIGN_WORD_SIZE_INTEGERS
</span><br>
<span class="quotelev1">&gt;     * OMPI_WANT_LIBLTDL
</span><br>
<span class="quotelev1">&gt;     * (also, OMPI_ENABLE_DLOPEN_SUPPORT)
</span><br>
<span class="quotelev1">&gt;     * OMPI_STDC_HEADERS
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_SYS_TIME_H
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_LONG_LONG
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_SYS_SYNCH_H
</span><br>
<span class="quotelev1">&gt;     * OMPI_SIZEOF_BOOL
</span><br>
<span class="quotelev1">&gt;     * OMPI_SIZEOF_INT
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_check_attributes.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_ALIGNED
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__aligned)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_ALWAYS_INLINE
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__always_inline)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_COLD
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__cold)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_CONST
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__const)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_DEPRECATED
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__deprecated)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_FORMAT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__format)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_HOT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__hot)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_MALLOC
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__malloc)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_MAY_ALIAS
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__may_alias)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_NO_INSTRUMENT_FUNCTION
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__no_instrument_function)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_NONNULL
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__nonnull)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_NORETURN
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__noreturn)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_PACKED
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__packed)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_PURE
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__pure)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_SENTINEL
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__sentinel)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_UNUSED
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__unused)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_VISIBILITY
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__visibility)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_WARN_UNUSED_RESULT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__warn_unused_result)
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ATTRIBUTE_WEAK_ALIAS
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv___attribute__weak_alias)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_check_ident.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_$1_USE_PRAGMA_IDENT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_pragma_ident_happy)
</span><br>
<span class="quotelev1">&gt;     * OMPI_$1_USE_IDENT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_ident_happy)
</span><br>
<span class="quotelev1">&gt;     * OMPI_$1_USE_PRAGMA_COMMENT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_pragma_comment_happy)
</span><br>
<span class="quotelev1">&gt;     * OMPI_$1_USE_CONST_CHAR_IDENT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_static_const_char_happy)
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_check_pthreads_pids.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_THREADS_HAVE_DIFFERENT_PIDS
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_check_visibility.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_HAVE_VISIBILITY
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_config_asm.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_TEXT
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_text)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_GLOBAL
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_global)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_LSYM
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_lsym)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_GSYM
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_gsym)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_LABEL_SUFFIX
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_latel_suffix)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_ALIGN_LOG
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_TYPE
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_type)
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_SIZE
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_asm_size)
</span><br>
<span class="quotelev1">&gt;     * OMPI_POWERPC_R_REGISTERS
</span><br>
<span class="quotelev1">&gt;     * (also, ompi_cv_asm_powerpc_r_reg)
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_GCC_INLINE_ASSEMBLY
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_DEC_INLINE_ASSEMBLY
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_XLC_INLINE_ASSEMBLY
</span><br>
<span class="quotelev1">&gt;     * OMPI_WANT_SMP_LOCKS
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASM_SUPPORT_64BIT
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASSEMBLY_FORMAT
</span><br>
<span class="quotelev1">&gt;     * OMPI_ASSEMBLY_ARCH
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_ASM_FILE
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_config_threads.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_POSIX_THREADS
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_SOLARIS_THREADS
</span><br>
<span class="quotelev1">&gt;     * OMPI_THREADS_HAVE_DIFFERENT_PIDS
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_MPI_THREADS
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_PROGRESS_THREADS
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_functions.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_ARCH
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_setup_cc.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_HAVE_BUILTIN_EXPECT
</span><br>
<span class="quotelev1">&gt;     * OMPI_C_HAVE_BUILTIN_PREFETCH
</span><br>
<span class="quotelev1">&gt;     * OMPI_CC
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../config/ompi_configure_options.m4.
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_MEM_DEBUG
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_MEM_PROFILE
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_DEBUG
</span><br>
<span class="quotelev1">&gt;     * OMPI_WANT_PRETTY_PRINT_STACKTRACE
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_PTY_SUPPORT
</span><br>
<span class="quotelev1">&gt;     * OMPI_ENABLE_HETEROGENEOUS_SUPPORT
</span><br>
<span class="quotelev1">&gt;     * OMPI_WANT_HOME_CONFIG_FILES
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * From .../opal/include/opal_config_bottom.h.
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_THREADS
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_THREAD_SUPPORT
</span><br>
<span class="quotelev1">&gt;     * OMPI_ALIGNMENT_CHAR
</span><br>
<span class="quotelev1">&gt;     * OMPI_ALIGNMENT_SHORT
</span><br>
<span class="quotelev1">&gt;     * OMPI_ALIGNMENT_INT
</span><br>
<span class="quotelev1">&gt;     * OMPI_ALIGNMENT_LONG
</span><br>
<span class="quotelev1">&gt;     * OMPI_PATH_MAX
</span><br>
<span class="quotelev1">&gt;     * OMPI_DISABLE_ENABLE_MEM_DEBUG
</span><br>
<span class="quotelev1">&gt;     * OMPI_DEBUG_ZERO
</span><br>
<span class="quotelev1">&gt;     * OMPI_HAVE_BROKEN_QSORT
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * Due to changing the values set in the above steps, the .m4 configure macro
</span><br>
<span class="quotelev1">&gt; files are now named inappropriately.  Therefore, update the following
</span><br>
<span class="quotelev1">&gt; filenames and change the configure scripts to point to the correct new
</span><br>
<span class="quotelev1">&gt; names.
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_check_attributes.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_check_attributes.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_check_ident.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_check_ident.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_check_pthread_pids.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_check_pthread_pids.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_check_visibility.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_check_visibility.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_config_asm.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_config_asm.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_config_threads.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_config_threads.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_functions.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_functions.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_setup_cc.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_setup_cc.m4
</span><br>
<span class="quotelev1">&gt;     * .../config/ompi_configure_options.m4 to
</span><br>
<span class="quotelev1">&gt;       .../config/opal_configure_options.m4
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt; * Remove unnecessary #include lines from source code files under the
</span><br>
<span class="quotelev1">&gt; .../ompi/mca/btl subtree that are not needed.
</span><br>
<span class="quotelev1">&gt;     * #include &quot;ompi/mca/pml/oml.h&quot;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<span class="quotelev1">&gt;
</span><br>
<!-- body="end" -->
<hr>
<ul class="links">
<!-- next="start" -->
<li><strong>Next message:</strong> <a href="5391.php">Ralph Castain: "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<li><strong>Previous message:</strong> <a href="5389.php">Greg Koenig: "[OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<li><strong>In reply to:</strong> <a href="5389.php">Greg Koenig: "[OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<!-- nextthread="start" -->
<li><strong>Next in thread:</strong> <a href="5391.php">Ralph Castain: "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
<li><strong>Reply:</strong> <a href="5391.php">Ralph Castain: "Re: [OMPI devel] RFC: Rename several OMPI_* names to OPAL_*"</a>
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
